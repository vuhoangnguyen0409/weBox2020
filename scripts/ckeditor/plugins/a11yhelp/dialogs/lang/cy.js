hN�=����`'���f�P�P���XiJ�y��qqF|�}�ِq�Gm��< ���`��>�#��j~A゠�be��	Gc����y���[�υ�?��Qj��N��r�S#�F)EО�F!�`�7YP^�_v��8�ǮU"��(�o��U�j��%��J��D}�Z�E��^t�q,w,�ezU�\�0��'3�f�A#���Ŏ�<��7���7n�@�n��,5�>wuN>.�>�����W����E��GT�b��Mۃޏ���A���i���F�F��iG��B�o�+������=��E�.��lR�����;I���^Vwu~A�������珜?z��I׬#��5�+&1�O������H���&;���a�V��&���o� 	�Ed=M�"JD�*2RF�Gh!(L��@� {��Z $�<	��J�^�}��Uw���:�Bh��nO�7}6� ĄVy��qh�k��#ͦ���3��+�o��H�02<�q]�C�#��"Q��p���|g ��Ի��N"\᭬�G�Z:�,�� żƼ���:��\�]����~���맯���$vJ������1�=edv�6O��T<R�H5��FW�ї��'(+BI�,`�ը:@��v{8B��a%/�����E^+,	hc-�]�� ��J�h�� 8�Q{��A����}�|�ZziW����a���������!��7��෻|]~xnW�T��Y�e�Κ|�?�Ա�'����W�����H�c��̝ՑC�����}����F��/����Med�g8:�^� %a�����h��+@�;�si
Б7��
�j�n%���s�!�3�rhU�����`�sr�@Ԏn$�Pҕt�6��F����C��� @�������>�!��p�S���B65�;��|A���b$%dHȻ[R�Y5�����J�b~�Ʈg�1�ƃ�|{3�e~ɰ-��� �i��+�/W��a\��ԡ��@�d 0Q-��� �L�ޚG�~��z7�J�$�V ���K�3jwT�����o�uП���;h@�[� v��9�� k�Z�~�W�G-�/i%��ì����������3��K���-y?�mS_�ĸ���ƌ��Ό{>z0ҝ���n��������0�ρ���ue�50>�&�Ɓ^ئN�2�W$[f��Y(2��s~�hd�0��/�h�F43�K�,h4S�*��`6��B�s���IOm�Ŗm��]�S�y���>o�.}�䀯PZ��0B�%�{�E&9̝�s�\�9�6�0ܚ e�x�Z� �� k e=�M���
�A� ��1�k�%\�Œc|��S���9ϐ}全;�EO8�ΓN��Q�6\�Ƞ���oF�?������z��kLu���՗枅升�F������޼	��I�A\/�"�a���iQ�?q�����bE�i3��G�^�����\���a����AJ^�e�"� k�$�kH��XsJ�NyT(�������8�e��ѹȖ�|�%�|���s|��=����|g��3��F��m��Z[5�w�1�7T��L��6��yi���������
�Be����C�G�0���=ګ�	��ޯ�̬�d!H.���_1�UG���틶Es�h�'��S���'�&~��[qv�v<ձ�լ�,v���ֵ��v�����R�nr��Amm:6��Я�X�s+j��T�T?������R������/�.�C(ʷ8�a�JQ�P������`�C�F�sxHY���+�p���m �VK�^
��4B@�j��ח������6����...�D-F���.�{�~�Y�hW
�ʙ� �l�VO�=-+��?����;���D�����b援$��l��3w�p��ٷ�o�3+n��j�!y��hz9���gܯ�� rֹ�l_�/���S�J��h�P�>C&mG&۷�+�$�(�%���ZH�0��\)k���~��{ ��@�C@1�<�Ӓ�d�Ӽ�h�(Xt-Z��fQ��!%��L����g6�m*�|h����JJ�����,�iUcs���E��w�R3z�� i�7q�񜞘$_�c|�j��Hif=��4_�r Rr@^�6f�c��6��p��l}`|�ØP�l�ڣd�|��J/�<�:����\�.�d���Ej��2��T� ���"T�   "zTXtSoftware  x�+//����.NN,H��/J 6�XS�\    IEND�B`�                                                                                                                                                                                                                                                                         class='ui-progressbar-overlay'></div>").appendTo(this.valueDiv))):(this.element.attr({"aria-valuemax":this.options.max,"aria-valuenow":e}),this.overlayDiv&&(this.overlayDiv.remove(),this.overlayDiv=null)),this.oldValue!==e&&(this.oldValue=e,this._trigger("change")),e===this.options.max&&this._trigger("complete")}})})(jQuery);(function(t){var e=5;t.widget("ui.slider",t.ui.mouse,{version:"1.10.4",widgetEventPrefix:"slide",options:{animate:!1,distance:0,max:100,min:0,orientation:"horizontal",range:!1,step:1,value:0,values:null,change:null,slide:null,start:null,stop:null},_create:function(){this._keySliding=!1,this._mouseSliding=!1,this._animateOff=!0,this._handleIndex=null,this._detectOrientation(),this._mouseInit(),this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget"+" ui-widget-content"+" ui-corner-all"),this._refresh(),this._setOption("disabled",this.options.disabled),this._animateOff=!1},_refresh:function(){this._createRange(),this._createHandles(),this._setupEvents(),this._refreshValue()},_createHandles:function(){var e,i,s=this.options,n=this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),a="<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>",o=[];for(i=s.values&&s.values.length||1,n.length>i&&(n.slice(i).remove(),n=n.slice(0,i)),e=n.length;i>e;e++)o.push(a);this.handles=n.add(t(o.join("")).appendTo(this.element)),this.handle=this.handles.eq(0),this.handles.each(function(e){t(this).data("ui-slider-handle-index",e)})},_createRange:funct         <li><a href="#">Đây là đoạn văn bản mẫu</a></li>
                        <li><a href="#">Đây là đoạn văn bản mẫu</a></li>
                 