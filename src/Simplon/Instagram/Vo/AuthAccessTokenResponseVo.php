<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class AuthAccessTokenResponseVo
    {
        protected $_accessToken;
        protected $_userData;
        protected $_userVo;

        // ######################################

        /**
         * @param array $data
         *
         * @return AuthAccessTokenResponseVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('access_token', function ($val) { $this->setAccessToken($val); })
                ->setField('user', function ($val) { $this->setUserData($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getAccessToken()
        {
            return (string)$this->_accessToken;
        }

        // ######################################

        /**
         * @param string $accessToken
         *
         * @return AuthAccessTokenResponseVo
         */
        public function setAccessToken($accessToken)
        {
            $this->_accessToken = $accessToken;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getUserData()
        {
            return (array)$this->_userData;
        }

        // ######################################

        /**
         * @param array $userData
         *
         * @return AuthAccessTokenResponseVo
         */
        public function setUserData(array $userData)
        {
            $this->_userData = $userData;

            return $this;
        }

        // ######################################

        /**
         * @return UserVo
         */
        public function getUserVo()
        {
            if (!$this->_userVo)
            {
                $this->_userVo = (new UserVo())->setData($this->getUserData());
            }

            return $this->_userVo;
        }
    } 