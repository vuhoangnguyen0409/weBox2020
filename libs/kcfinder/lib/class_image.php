adius:3px;-moz-box-shadow:0 1px 2px rgba(0,0,0,.15) inset;-webkit-box-shadow:0 1px 2px rgba(0,0,0,.15) inset;box-shadow:0 1px 2px rgba(0,0,0,.15) inset}.cke_dialog_ui_input_file{width:100%;height:25px}.cke_hc .cke_dialog_ui_labeled_content input:focus,.cke_hc .cke_dialog_ui_labeled_content select:focus,.cke_hc .cke_dialog_ui_labeled_content textarea:focus{outline:1px dotted}.cke_dialog .cke_dark_background{background-color:#dedede}.cke_dialog .cke_light_background{background-color:#ebebeb}.cke_dialog .cke_centered{text-align:center}.cke_dialog a.cke_btn_reset{float:right;background:url(images/refresh.png) top left no-repeat;width:16px;height:16px;border:1px none;font-size:1px}.cke_hidpi .cke_dialog a.cke_btn_reset{background-size:16px;background-image:url(images/hidpi/refresh.png)}.cke_rtl .cke_dialog a.cke_btn_reset{float:left}.cke_dialog a.cke_btn_locked,.cke_dialog a.cke_btn_unlocked{float:left;width:16px;height:16px;background-repeat:no-repeat;border:none 1px;font-size:1px}.cke_dialog a.cke_btn_locked .cke_icon{display:none}.cke_rtl .cke_dialog a.cke_btn_locked,.cke_rtl .cke_dialog a.cke_btn_unlocked{float:right}.cke_dialog a.cke_btn_locked{background-image:url(images/lock.png)}.cke_dialog a.cke_btn_unlocked{background-image:url(images/lock-open.png)}.cke_hidpi .cke_dialog a.cke_btn_unlocked,.cke_hidpi .cke_dialog a.cke_btn_locked{background-size:16px}.cke_hidpi .cke_dialog a.cke_btn_locked{background-image:url(images/hidpi/lock.png)}.cke_hidpi .cke_dialog a.cke_btn_unlocked{background-image:url(images/hidpi/lock-open.png)}.cke_dialog .cke_btn_over{border:outset 1px;cursor:pointer}.cke_dialog .ImagePreviewBox{border:2px ridge black;overflow:scroll;height:200px;width:300px;padding:2px;background-color:white}.cke_dialog .ImagePreviewBox table td{white-space:normal}.cke_dialog .ImagePreviewLoader{position:absolute;white-space:normal;overflow:hidden;height:160px;width:230px;margin:2px;padding:2px;opacity:.9;filter:alpha(opacity = 90);background-color:#e4e4e4}.cke_dialog .FlashPreviewBox{white-space:normal;border:2px ridge black;overflow:auto;height:160px;width:390px;padding:2px;background-color:white}.cke_dialog .cke_pastetext{width:346px;height:170px}.cke_dialog .cke_pastetext textarea{width:340px;height:170px;resize:none}.cke_dialog iframe.cke_pasteframe{width:346px;height:130px;background-color:white;border:1px solid #aeb3b9;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px}.cke_dialog .cke_hand{cursor:pointer}.cke_disabled{color:#a0a0a0}.cke_dialog_body .cke_label{display:none}.cke_dialog_body label{display:inline;margin-bottom:auto;cursor:default}.cke_dialog_body label.cke_required{font-weight:bold}a.cke_smile{overflow:hidden;display:block;text-align:center;padding:.3em 0}a.cke_smile img{vertical-align:middle}a.cke_specialchar{cursor:inherit;display:block;height:1.25em;padding:.2em .3em;text-align:center}a.cke_smile,a.cke_specialchar{border:1px solid transparent}a.cke_smile:hover,a.cke_smile:focus,a.cke_smile:active,a.cke_specialchar:hover,a.cke_specialchar:focus,a.cke_specialchar:active{background:#fff;outline:0}a.cke_smile:hover,a.cke_specialchar:hover{border-color:#888}a.cke_smile:focus,a.cke_smile:active,a.cke_specialchar:focus,a.cke_specialchar:active{border-color:#139ff7}.cke_dialog_contents a.colorChooser{display:block;margin-top:6px;margin-left:10px;width:80px}.cke_rtl .cke_dialog_contents a.colorChooser{margin-right:10px}.cke_dialog_ui_checkbox_input:focus,.cke_dialog_ui_radio_input:focus,.cke_btn_over{outline:1px dotted #696969}.cke_iframe_shim{display:block;position:absolute;top:0;left:0;z-index:-1;filter:alpha(opacity = 0);width:100%;height:100%}.cke_rtl input.cke_dialog_ui_input_text,.cke_rtl input.cke_dialog_ui_input_password{padding-right:2px}.cke_rtl div.cke_dialog_ui_input_text,.cke_rtl div.cke_dialog_ui_input_password{padding-left:2px}.cke_rtl div.cke_dialog_ui_input_text{padding-right:1px}.cke_rtl .cke_dialog_ui_vbox_child,.cke_rtl .cke_dialog_ui_hbox_child,.cke_rtl .cke_dialog_ui_hbox_first,.cke_rtl .cke_dialog_ui_hbox_last{padding-right:2px!important}.cke_hc .cke_dialog_title,.crtional height from the given width
  * @param integer $resizedWidth
  * @return integer */

    final public function getPropHeight($resizedWidth) {
        $height = round(($this->height * $resizedWidth) / $this->width);
        if (!$height) $height = 1;
        return $height;
    }


/** Checks if PHP needs some extra extensions to use the image driver. This
  * static method should be implemented into driver classes like abstract
  * methods
  * @return bool */
    static function available() { return false; }

/** Checks if file is an image. This static method should be implemented into
  * driver classes like abstract methods
  * @param string $file
  * @return bool */
    static function checkImage($file) { return false; }

/** Resize image. Should return TRUE on success or FALSE on failure
  * @param integer $width
  * @param integer $height
  * @return bool */
    abstract public function resize($width, $height);

/** Resize image to fit in given resolution. Should returns TRUE on success
  * or FALSE on failure. If $background is set, the image size will be
  * $width x $height and the empty spaces (if any) will be filled with defined
  * color. Background color examples: "#5f5", "#ff67ca", array(255, 255, 255)
  * @param integer $width
  * @param integer $height
  * @param mixed $background
  * @return bool */
    abstract public function resizeFit($width, $height, $background=false);

/** Resize and crop the image to fit in given resolution. Returns TRUE on
  * success or FALSE on failure
  * @param mixed $src
  * @param integer $offset
  * @return bool */
    abstract public function resizeCrop($width, $height, $offset=false);


/** Rotate image
  * @param integer $angle
  * @param string $background
  * @return bool */
    abstract public function rotate($angle, $background="#000000");

    abstract public function flipHorizontal();

    abstract public function flipVertical();

/** Apply a PNG or GIF watermark to the image. $top and $left parameters sets
  * the offset of the watermark in pixels. Boolean and NULL values are possible
  * too. In default case (FALSE, FALSE) the watermark should be applyed to
  * the bottom right corner. NULL values means center aligning. If the
  * watermark is bigger than the image or it's partialy or fully outside the
  * image, it shoudn't be applied
  * @param string $file
  * @param mixed $top
  * @param mixed $left
  * @return bool */
    abstract public function watermark($file, $left=false, $top=false);

/** Should output the image. Second parameter is used to pass some options like
  *   'file' - if is set, the output will be written to a file
  *   'quality' - compression quality
  * It's possible to use extra specific options required by image type ($type)
  * @param string $type
  * @param array $options
  * @return bool */
    abstract public function output($type='jpeg', array $options=array());

/** This method should create a blank image with selected size. Should returns
  * resource or object related to the created image, which will be passed to
  * $image property
  * @param integer $width
  * @param integer $height
  * @return mixed */
    abstract protected function getBlankImage($width, $height);

/** This method should create an image from source image. Only first parameter
  * ($image) is input. Its type should be filename string or a type of the
  * $image property. See the constructor reference for details. The
  * parametters $width and $height are output only. Should returns resource or
  * object related to the created image, which will be passed to $image
  * property
  * @param mixed $image
  * @param integer $width
  * @param integer $height
  * @return mixed */
    abstract protected function getImage($image, &$width, &$height);

}

?>