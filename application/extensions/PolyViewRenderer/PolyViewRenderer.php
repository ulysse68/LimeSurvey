<?php
    class PolyViewRenderer implements IViewRenderer, IApplicationComponent
    {
        /**
         * Contains list of renderers that should be loaded.
         * Index is the type, value is the configuration array.
         * @var array
         */
        public $renderers = array();
        /**
         * Stores the initialized renderers.
         * Index is the type, value is the renderer object.
         * @var array
         */
        protected $_renderers = array();
        
        public $fileExtension='.view';

        /**
         *
         * @param type $type
         * @param type $createIfNull
         * @return CViewRenderer
         */
        protected function getRenderer($type, $createIfNull = true)
        {
            if (!isset($this->_renderers[$type]))
            {
                if (isset($this->renderers[$type]) && $createIfNull)
                {
                    $config = $this->renderers[$type];
                    $config['fileExtension'] = '.view';
                    $this->_renderers[$type] = Yii::createComponent($config);
                    $this->_renderers[$type]->init();
                }
                else
                {
                    return;
                }
            }
            return $this->_renderers[$type];
        }

        /**
         * Gets the type of renderer to use based on the filename.
         * @param string $filename
         * @return string
         */
        protected function getType($filename)
        {
            $matches = array();
            preg_match('/^[^_]*(?:_(.*))?\.(?:.*)$/', $filename, $matches);
            if (count($matches) == 2)
            {
                $type = $matches[1];
            }
            else
            {
                $type = 'php';
            }
            return $type;
        }

        public function getIsInitialized() {
            return true;
        }

        public function init() {

        }
        /**
         * Renders a view file.
         * This method is required by {@link IViewRenderer}.
         * @param CBaseController $context the controller or widget who is rendering the view file.
         * @param string $sourceFile the view file path
         * @param mixed $data the data to be passed to the view
         * @param boolean $return whether the rendering result should be returned
         * @return mixed the rendering result, or null if the rendering result is not needed.
         */
        public function renderFile($context, $sourceFile, $data, $return)
        {
            if(!is_file($sourceFile) || ($file=realpath($sourceFile))===false)
                throw new CException(Yii::t('yii','View file "{file}" does not exist.',array('{file}'=>$sourceFile)));

            $type = $this->getType($sourceFile);
            if ($this->getRenderer($type) === null)
            {
                return $context->renderInternal($sourceFile,$data,$return);
            }
            else
            {
                return $this->getRenderer($type)->renderFile($context, $sourceFile, $data, $return);
            }
        }


    }

