<?php

    namespace Simplon\Instagram\Core;

    use Simplon\Instagram\Vo\AuthAccessTokenResponseVo;
    use Simplon\Instagram\Vo\AuthUrlRequestVo;
    use Simplon\Instagram\Vo\AuthVo;

    class Instagram
    {
        protected $_authVo;

        // ######################################

        /**
         * @param AuthVo $authVo
         */
        public function __construct(AuthVo $authVo)
        {
            $this->_authVo = $authVo;
        }

        // ######################################

        /**
         * @return AuthVo
         */
        protected function _getAuthVo()
        {
            return $this->_authVo;
        }

        // ######################################

        /**
         * @return string
         * @throws InstagramException
         */
        protected function _getAuthClientId()
        {
            $clientId = $this
                ->_getAuthVo()
                ->getClientId();

            if (!$clientId)
            {
                throw new InstagramException(
                    InstagramConstants::ERR_AUTH_MISSING_CLIENT_ID_CODE,
                    InstagramConstants::ERR_AUTH_MISSING_CLIENT_ID_MESSAGE
                );
            }

            return $clientId;
        }

        // ######################################

        /**
         * @return string
         * @throws InstagramException
         */
        protected function _getAuthClientSecret()
        {
            $clientSecret = $this
                ->_getAuthVo()
                ->getClientSecret();

            if (!$clientSecret)
            {
                throw new InstagramException(
                    InstagramConstants::ERR_AUTH_MISSING_CLIENT_SECRET_CODE,
                    InstagramConstants::ERR_AUTH_MISSING_CLIENT_SECRET_MESSAGE
                );
            }

            return $clientSecret;
        }

        // ######################################

        /**
         * @return string
         * @throws InstagramException
         */
        protected function _getAuthUrlRedirect()
        {
            $urlRedirect = $this
                ->_getAuthVo()
                ->getUrlRedirect();

            if (!$urlRedirect)
            {
                throw new InstagramException(
                    InstagramConstants::ERR_AUTH_MISSING_REDIRECT_URI_CODE,
                    InstagramConstants::ERR_AUTH_MISSING_REDIRECT_URI_MESSAGE
                );
            }

            return $urlRedirect;
        }

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