<?php

    namespace Simplon\Instagram\Core;

    use Simplon\Instagram\Vo\AuthAccessTokenResponseVo;
    use Simplon\Instagram\Vo\AuthUrlRequestVo;

    class Instagram
    {
        use InstagramConstructTrait;

        // ######################################

        /**
         * @param AuthUrlRequestVo $authUrlRequestVo
         *
         * @return string
         * @throws InstagramException
         */
        public function getAuthUrl(AuthUrlRequestVo $authUrlRequestVo)
        {
            $params = [
                'client_id'     => $this->_getAuthClientId(),
                'redirect_uri'  => $this->_getAuthUrlRedirect(),
                'response_type' => 'code',
            ];

            // add additional scopes

            if ($authUrlRequestVo->hasScopes())
            {
                $params['scope'] = $authUrlRequestVo->getScopesString();
            }

            // add state

            if ($authUrlRequestVo->hasState())
            {
                $params['state'] = $authUrlRequestVo->getState();
            }

            // ----------------------------------

            return InstagramRequests::getAuthUrl($params);
        }

        // ######################################

        /**
         * @param $code
         *
         * @return AuthAccessTokenResponseVo
         * @throws InstagramException
         */
        public function requestAccessToken($code)
        {
            $params = [
                'client_id'     => $this->_getAuthClientId(),
                'client_secret' => $this->_getAuthClientSecret(),
                'redirect_uri'  => $this->_getAuthUrlRedirect(),
                'grant_type'    => 'authorization_code',
                'code'          => $code,
            ];

            $response = InstagramRequests::post(InstagramConstants::ENDPOINT_OAUTH_ACCESS_TOKEN, $params);

            return (new AuthAccessTokenResponseVo())->setData($response);
        }
    }