<?php

namespace Atlassian\JiraRest\Requests\User;

use Atlassian\JiraRest\Models\User\User;

/**
 * @method User get(array $params = [])
 */
class UserGetRequest extends UserBaseRequest
{
  /**
   * @var array
   */
  protected $options = [
    'get' => [
      'username',
      'key',
      'expand',
    ],
  ];

  /**
   * @param string $response
   * @param string $method
   * @return mixed
   */
  public function handleResponse($response, $method)
  {
    $this->response = json_decode($response);

    return User::fromJira($this->response);
  }

}
