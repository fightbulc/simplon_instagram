<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class UserInPhotoVo
    {
        protected $_userData;
        protected $_position;
        protected $_userShortVo;

        // ######################################

        /**
         * @param array $data
         *
         * @return UserInPhotoVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('user', function ($val) { $this->setUserData($val); })
                ->setField('position', function ($val) { $this->setPosition($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getPosX()
        {
            return (float)$this->_position['x'];
        }

        // ######################################

        /**
         * @return float
         */
        public function getPosY()
        {
            return (float)$this->_position['y'];
        }

        // ######################################

        /**
         * @param array $position
         *
         * @return UserInPhotoVo
         */
        public function setPosition(array $position)
        {
            $this->_position = $position;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        protected function _getUserData()
        {
            return (array)$this->_userData;
        }

        // ######################################

        /**
         * @param array $userData
         *
         * @return UserInPhotoVo
         */
        public function setUserData(array $userData)
        {
            $this->_userData = $userData;

            return $this;
        }

        // ######################################

        /**
         * @return UserShortVo
         */
        public function getUser()
        {
            if (!$this->_userShortVo)
            {
                $this->_userShortVo = (new UserShortVo())->setData($this->_getUserData());
            }

            return $this->_userShortVo;
        }
    } 