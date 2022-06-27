/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 web site only.
 * If you want to use this file on more web sites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 web site (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

var ETS_SC_CONFIRM_DELETED = ets_sc_confirm_deleted || 'Do you want to delete this item?';

$(document).ready(function () {

    $('.ets-sc-fancybox').fancybox();

    $(document).on('click', '.ets-sc-drag-drop-upload-file', function () {
        var form = $(this).closest('form');
        form.find('input[type=file][name=image]').trigger('click');
    });

    $(document).on('change', 'input[type=file][name=image]', function () {
        var form = $(this).closest('form'), input = this;
        if (this.files && this.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
                if (form.find('.image-thumbnail').length <= 0) {
                    form.find('.ets-sc-thumbnail-wrapper').append('<img src="#" alt="" width="80" class="imgm image-thumbnail">');
                    form.find('.ets-sc-thumbnail-wrapper').parent('.ets-sc-img-upload').addClass('img_base');
                }
                var _thumbnail = form.find('.ets-sc-thumbnail-wrapper .image-thumbnail');
                _thumbnail.attr({
                    src: e.target.result,
                    alt: input.files[0].name,
                    width: '80'
                });
            };
            fileReader.readAsDataURL(this.files[0]);
        }
    });

    $(document).on('click', 'button[name=postImage]', function (e) {
        e.preventDefault()
        $('#form_id_0').removeClass('hide');
    });

    $(document).on('change', 'form input[type=text], form input[type=file]', function (e) {
        e.preventDefault();
        var btn = $(this),
            form = btn.closest('form')
        ;
        if (!btn.hasClass('active')) {
            btn.addClass('active');
            var formData = new FormData(form.get(0));
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (json) {
                    btn.removeClass('active');
                    if (json) {
                        if (json.errors)
                            showErrorMessage(json.errors);
                        else {
                            if (json.image) {
                                var formInput = $('#form_id_0');
                                if ($('#form_id_' + json.id).length < 1) {
                                    formInput.addClass('hide').before(json.image);
                                    formInput.find('.ets-sc-img-upload.img_base').removeClass('img_base');
                                    formInput.find('.imgm.image-thumbnail').remove();
                                    formInput[0].reset();
                                }
                            }
                            if (json.msg)
                                showSuccessMessage(json.msg);
                        }
                    }
                },
                error: function () {
                    btn.removeClass('active');
                }
            })
        }
    });

    $(document).on('click', '.ets-sc-btn-delete', function (e) {
        e.preventDefault();
        var btn = $(this);
        if (!btn.hasClass('active') && confirm(ETS_SC_CONFIRM_DELETED)) {
            btn.addClass('active');
            $.ajax({
                url: btn.attr('href'),
                type: 'post',
                dataType: 'json',
                success: function (json) {
                    btn.removeClass('active');
                    if (json) {
                        if (json.errors)
                            showErrorMessage(json.errors);
                        else {
                            if (json.msg)
                                showSuccessMessage(json.msg);
                            btn.parents('.listing-row').remove();
                            if ($('.listing-row').length === 1) {
                                $('#form_id_0').removeClass('hide');
                            }
                        }
                    }
                },
                error: function () {
                    btn.removeClass('active');
                }
            });
        }
    });
});
