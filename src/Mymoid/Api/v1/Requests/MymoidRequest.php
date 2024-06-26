<?php
/**
 * Class MymoidRequest
 *
 * @author    MYMOID <support@mymoid.com>
 * @copyright 2024 MYMOID
 * @license   ISC https://opensource.org/license/isc-license-txt
 */

namespace Mymoid\Api\v1\Requests;

use Mymoid\Api\Interfaces\MymoidRequestInterface;
use Mymoid\Api\MymoidObject;
use Mymoid\Api\v1\Client\MymoidClient;
use Mymoid\Api\v1\Common\Constants;
use Mymoid\Api\v1\Schemas\ApiError;
use Mymoid\Traits\MymoidParser;

class MymoidRequest extends MymoidObject implements MymoidRequestInterface
{
    use MymoidParser;

    protected MymoidClient $mmclient;
    protected MymoidObject $object;
    protected string $object_type = '';

    protected MymoidObject $object_response;
    protected string $object_type_response = '';

    protected mixed $response = null;

    protected string $endpoint = '';
    protected string $method = 'GET';
    protected int $status_code = 0;

    protected array $headers = [];
    protected array $query_params = [];
    protected array $path_params = [];

    protected string $url = '';
    protected string $query_params_url = '';

    public function __construct(
        MymoidClient $mmclient,
        MymoidObject $object,
        ?MymoidObject $object_response = null
    ) {
        $this->mmclient = $mmclient;
        $this->object = $object;
        $this->object_type = get_class($object);

        if (!is_null($object_response)) {
            $this->object_type_response = get_class($object_response);
        }

        if ($this->mmclient->getConfiguration()->isSandbox()) {
            $this->url = Constants::SANDBOX_SERVER . Constants::MYMOID_API_VERSION . $this->endpoint;
        } else {
            $this->url = Constants::PRODUCTION_SERVER . Constants::MYMOID_API_VERSION . $this->endpoint;
        }
    }

    /**
     * Handles the request, parses the response and returns the object
     *
     * @return MymoidRequest
     */
    public function handle(): self
    {
        // Prepare the URL with path and query params
        $this->pathParamsToUrl();
        $this->queryParamsToUrl();

        $request = $this->mmclient->getFactory()
            ->createRequest($this->method, $this->url
                . (!empty($this->query_params_url) ? '?' . $this->query_params_url : ''))
            ->withBody($this->mmclient->getFactory()->createStream(
                $this->object->toJson()
            ))
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('x-api-key', $this->mmclient->getConfiguration()->getApiKey());

        // Organization and Payment Point IDs are optional
        if ($this->mmclient->getConfiguration()->getOrganizationId() !== '') {
            $request = $request->withHeader(
                'x-organization-id',
                $this->mmclient->getConfiguration()->getOrganizationId()
            );
        }

        if ($this->mmclient->getConfiguration()->getPaymentPointId() !== '') {
            $request = $request->withHeader(
                'x-payment-point-id',
                $this->mmclient->getConfiguration()->getPaymentPointId()
            );
        }

        $response = $this->mmclient->getClient()->sendRequest($request);
        $response_content = $response->getBody()->getContents();

        // Get the response code
        $this->status_code = $response->getStatusCode();

        $schema_response = null;

        // Correct status codes are 200 and 201
        if ($this->status_code !== 201 && $this->status_code !== 200) {
            $schema_response = new ApiError();
            $schema_response->parse($response_content);
        } else {
            $instance_object = $this->getObjectType();
            $instance_object_response = $this->getObjectTypeResponse();

            if ($instance_object_response !== $instance_object && !empty($instance_object_response)) {
                $instance_object = $instance_object_response;
            }

            $schema_response = new $instance_object();
            $schema_response->parse($response_content);
        }

        $this->response = $schema_response;
        $this->headers = $response->getHeaders();

        return $this;
    }

    /**
     * Returns the full path to the endpoint, including parameters
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Returns the HTTP method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Returns the HTTP status code
     *
     * @see https://developer.mozilla.org/es/docs/Web/HTTP/Status
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    /**
     * Returns the response object
     *
     * @return mixed
     */
    public function getResponse(): mixed
    {
        return $this->response;
    }

    /**
     * Returns the response object type
     *
     * @return string
     */
    public function getObjectType(): string
    {
        return $this->object_type;
    }

    /**
     * Sets the response object type
     *
     * @param string $object_type
     *
     * @return MymoidRequest
     */
    public function setObjectType(string $object_type): MymoidRequest
    {
        $this->object_type = $object_type;

        return $this;
    }

    /**
     * Returns the response object type
     *
     * @return string
     */
    public function getObjectTypeResponse(): string
    {
        return $this->object_type_response;
    }

    /**
     * Sets the response object type
     *
     * @param string $object_type_response
     *
     * @return MymoidRequest
     */
    public function setObjectTypeResponse(string $object_type_response): MymoidRequest
    {
        $this->object_type_response = $object_type_response;

        return $this;
    }

    /**
     * Returns the petition headers
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Sets a header to the petition
     *
     * @param string $header
     * @param string $value
     *
     * @return MymoidRequest
     */
    public function setHeader(string $header, string $value): MymoidRequest
    {
        $this->headers[$header] = $value;

        return $this;
    }

    /**
     * Sets the headers to the petition
     *
     * @param array $headers
     *
     * @return MymoidRequest
     */
    public function setHeaders(array $headers): MymoidRequest
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Returns the query params
     *
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->query_params;
    }

    /**
     * Sets a query param to the petition
     *
     * @param string $query_param
     * @param string $value
     *
     * @return MymoidRequest
     */
    public function setQueryParam(string $query_param, string $value): MymoidRequest
    {
        $this->query_params[$query_param] = $value;

        return $this;
    }

    /**
     * Returns the path params
     *
     * @return array
     */
    public function getPathParams(): array
    {
        return $this->path_params;
    }

    /**
     * Sets a path param to the petition
     *
     * @param string $path_param
     * @param string $value
     *
     * @return MymoidRequest
     */
    public function setPathParam(string $path_param, string $value): MymoidRequest
    {
        $this->path_params[$path_param] = $value;

        return $this;
    }

    /**
     * Sets the query params to the URL
     *
     * @return MymoidRequest
     */
    public function queryParamsToUrl(): MymoidRequest
    {
        $tmp_url = $this->url;

        foreach ($this->query_params as $key => $value) {
            if (is_null($value) || $value === '' || empty($value)) {
                continue;
            }

            $tmp_url .= (strpos($tmp_url, '?') === false ? '?' : '&') . urlencode($key) . '=' . urlencode($value);
        }

        $this->url = $tmp_url;
        $this->jsonBodyToQueryParams();

        return $this;
    }

    /**
     * Sets the path params to the URL
     *
     * @return void
     */
    public function pathParamsToUrl(): MymoidRequest
    {
        $tmp_url = $this->url;

        foreach ($this->path_params as $key => $value) {
            $tmp_url = str_replace('{' . $key . '}', $value, $tmp_url);
        }

        $this->url = $tmp_url;

        return $this;
    }

    /**
     * Sets the query params to the URL
     *
     * @return void
     */
    private function jsonBodyToQueryParams(): MymoidRequest
    {
        $tmp_body_content = json_decode($this->object->toJson(), true);
        $query_params_url = '';

        foreach ($tmp_body_content as $key => $value) {
            if (in_array($key, array_keys($this->query_params))) {
                // If the value is an array, we need to implode it with comma
                if (is_array($value)) {
                    $value = implode(',', $value);
                }

                $query_params_url .= urlencode($key) . '=' . urlencode($value) . '&';
            }
        }

        $this->query_params_url = rtrim($query_params_url, '&');

        return $this;
    }
}
