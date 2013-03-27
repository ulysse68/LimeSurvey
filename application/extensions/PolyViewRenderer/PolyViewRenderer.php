<?php
    class PolyViewRenderer extends CViewRenderer
    {
        public $renderers = array();
        /**
         *
         * @param type $sourceFile
         * @param type $viewFile
         */
        protected function generateViewFile($sourceFile, $viewFile) 
        {
            var_dump($sourceFile);
            var_dump($viewFile);

            die('ok');
            copy($sourceFile, $viewFile);
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
            $viewFile=$this->getViewFile($sourceFile);
            if(@filemtime($sourceFile)>@filemtime($viewFile))
            {
                $this->generateViewFile($sourceFile,$viewFile);
                @chmod($viewFile,$this->filePermission);
            }
            return $context->renderInternal($viewFile,$data,$return);
        }
    }

