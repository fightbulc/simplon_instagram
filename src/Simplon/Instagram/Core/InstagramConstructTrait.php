<?php

    namespace Simplon\Instagram\Core;

    use Simplon\Instagram\Vo\AuthVo;

    trait InstagramConstructTrait
    {
        /** @var  AuthVo */
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
    } 