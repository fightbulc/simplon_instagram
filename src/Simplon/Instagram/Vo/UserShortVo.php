<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class UserShortVo
    {
        protected $_id;
        protected $_username;
        protected $_fullName;
        protected $_profilePicture;

        // ######################################

        /**
         * @param array $data
         *
         * @return UserShortVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('id', function ($val) { $this->setId($val); })
                ->setField('username', function ($val) { $this->setUsername($val); })
                ->setField('full_name', function ($val) { $this->setFullName($val); })
                ->setField('profile_picture', function ($val) { $this->setProfilePicture($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getFullName()
        {
            return (string)$this->_fullName;
        }

        // ######################################

        /**
         * @param string $fullName
         *
         * @return UserShortVo
         */
        public function setFullName($fullName)
        {
            $this->_fullName = $fullName;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        // ######################################

        /**
         * @param string $id
         *
         * @return UserShortVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getProfilePicture()
        {
            return (string)$this->_profilePicture;
        }

        // ######################################

        /**
         * @param string $profilePicture
         *
         * @return UserShortVo
         */
        public function setProfilePicture($profilePicture)
        {
            $this->_profilePicture = $profilePicture;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getUsername()
        {
            return (string)$this->_username;
        }

        // ######################################

        /**
         * @param string $username
         *
         * @return UserShortVo
         */
        public function setUsername($username)
        {
            $this->_username = $username;

            return $this;
        }
    } 