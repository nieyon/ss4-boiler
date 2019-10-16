$(document).ready(function() {
	app.init();
});

var app = {

	init: function() {
		var setup = this.setup;

		switch(pageID) {
			case 'HomePage':
				setup.homepage();
				break;
		}

		setup.menu();
	},

	setup: {

		menu: function() {

		},

		homepage: function() {
			
		},

	},

	accordion: {
		/**
		* ACCORDION: Slide down & up effect
		* - To take effect, must identify the button, holder/container, and element
		* - Add data-attribute to the button w/c is: data-collapse-id
		* - To execute (sample): app.accordion.init($('.faq__question'), 'faq__qa', 'faq__answer');
		**/
		init: function(button, elemHolder, hiddenElem) {
			var btn = button,
				holder = elemHolder,
				hidden_element = hiddenElem;

			btn.on('click', function() {
				var id = $(this).data('accordion-id');
				if($('#'+id).hasClass('is-active')) {
					$('#'+id+' .'+hidden_element).slideUp(300);
					$('.'+holder).removeClass('is-active');
	                
				} else {
					$('.'+holder).removeClass('is-active');
					$('.'+holder+' .'+hidden_element).slideUp(300);
					
					$('#'+id).addClass('is-active');
					$('#'+id+' .'+hidden_element).slideToggle(300);
				}
				
			});
		}
	},

	form: {
		/**
		* SENDING FORM
		* - Identify the form name, button name, the url (controller route), and if you want to 'refresh' the page.	
		**/
		init: function(formName, btnName, routeVal, boolean) {
			var form = formName,
				btn = btnName,
				route = routeVal,
				bool = boolean;

			form.validate({
				submitHandler: function(form) {
					swal({
						title: 'Sending ...',
						text: '',
						timer: 2000,
						onOpen: function () {
							swal.showLoading()
						}
					})
					var vars = $(form).serialize();
					$.post(baseHref + route, vars, function(data) {
						switch(data.status) {
							case 0:
								setMessage(false,data.message);
							break;
							case 1: 
								setMessage(true,data.message);
								$(form).trigger('reset');
								if(bool == true) {
									
									window.location.reload(1);
									
								}

							break;
						}

					}, 'json');
				}
			});

			$(btn).on('click', function(e) {
				e.preventDefault();
				form.submit();

				//label error -- for mobile
				if($(window).width() < 900) {
					$('label.error').empty();
					$('label.error').text("*");
				}
			});

			function setMessage(status, msg) {
				if(status) {
					swal('',msg,'success')
				} else {
					swal('',msg,'error')
				}
			}
		},

		/**
		* SENDING FORM W/ ATTACHMENTS
		* - Bind the uploaded file first, before sending.
		* - Identify where the file should be uploaded, button name, and the url (controller route).	
		* - Requirements: 
					Javascript:
						  jquery.fileupload.js
						  jquery.iframe-transport.js
						  jquery.ui.widget.js
					Composer:
						  "gargron/fileupload": "~1.4.0"
					Silverstripe:
						   Controller: Create UploadController
						   ModelAdmin: Create an admin manager for back up purposes (list of emails received)
						   Assets: Create folder inside, depends on what you declared
						   Template Syntax: 
						   		<label id="file-selected-permit" for="fileupload-permit" class="custom-file-upload">Business/Mayor Permit <i class="ion-paperclip"></i></label>
								<input type="file" id="fileupload-permit" name="file" style="display: none;">
								<input type="hidden" id="file-image-permit" name="permit" value="">

		**/
		bindUploadField: function(fileUpload, fileImg, fileSelected, formBtn, url) {
			var $file_upload = fileUpload,
				$file_img = fileImg,
				$file_selected = fileSelected,
				$form_btn = formBtn,
				$url = url;

			$file_upload.fileupload({
		        url: baseHref + $url,
		        dataType: 'json',
				submit: function(e, data) {},
				done: function(e, data) {
					switch(data.result.status) {
						case 0: break;
						case 1: 
							
							$file_img.val(data.result.message);
							$file_selected.html(data.result.filename);
							$form_btn.fadeIn(); 

						break;
					}
				}
		    });
		}
	},
};

