<?php

    namespace Simplon\Instagram\Vo;

    class AuthVo
    {
        protected $_clientId;
        protected $_clientSecret;
        protected $_urlRedirect;

        // ######################################

        /**
         * @return string
         */
        public function getClientId()
        {
            return (string)$this->_clientId;
        }

        // ######################################

        /**
         * @param mixed $clientId
         *
         * @return AuthVo
         */
        public function setClientId($clientId)
        {
            $this->_clientId = $clientId;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getClientSecret()
        {
            return (string)$this->_clientSecret;
        }

        // ######################################

        /**
         * @param mixed $clientSecret
         *
         * @return AuthVo
         */
        public function setClientSecret($clientSecret)
        {
            $this->_clientSecret = $clientSecret;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getUrlRedirect()
        {
            return (string)$this->_urlRedirect;
        }

        // ######################################
        
        /**
         * @param mixed $urlRedirect
         *
         * @return AuthVo
         */
        public function setUrlRedirect($urlRedirect)
        {
            $this->_urlRedirect = $urlRedirect;

            return $this;
        }
    } 