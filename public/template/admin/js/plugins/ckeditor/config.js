/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.allowedContent = true;
    config.filebrowserBrowseUrl = '../../template/admin/js/plugins/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '../../template/admin/ckfinder/ckfinder.html?type=Images';
    config.filebrowserUploadUrl = '../../template/admin/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '../../template/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
};


