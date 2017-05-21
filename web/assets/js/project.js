	
	$(window).load(function () {
		$('body').addClass('el-loading-done');
	});

	var maskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	options = {onKeyPress: function(val, e, field, options) {
		field.mask(maskBehavior.apply({}, arguments), options);
	}};
	$('.mask-phone').mask(maskBehavior, options);
	
	$('.mask-date').mask('00/00/0000');
	$('.mask-cpf').mask('000.000.000-00');
	$('.mask-cnpj').mask('00.000.000/0000-00');
	$('.mask-cep').mask('00000-000');

	// ui-snackbar.html
		var snackbarText = 1;

		$('#doc_snackbar_toggle_1').on('click', function () {
			$('body').snackbar({
				content: 'Simple snackbar ' + snackbarText + ' with some text',
				show: function () {
					snackbarText++;
				}
			});
		});

		$('#doc_snackbar_toggle_2').on('click', function () {
			$('body').snackbar({
				content: '<a data-dismiss="snackbar">Dismiss</a><div class="snackbar-text">Simple snackbar ' + snackbarText + ' with some text and a simple <a href="javascript:void(0)">link</a>.</div>',
				show: function () {
					snackbarText++;
				}
			});
		});
		
		$('.modal').on('shown.bs.modal', function() {
			$(this).find('[autofocus]').focus();
		});
		
		$('.modal').on('show.bs.modal', function() {
			var modal = this;
			var hash = modal.id;
			window.location.hash = hash;
			window.onhashchange = function() {
				if (!location.hash){
					$(modal).modal('hide');
				}
			}
		});

		$('.modal').on('hide.bs.modal', function() {
			var hash = this.id;
			history.pushState('', document.title, window.location.pathname);
		});
		
		// select all
		$(document).on('click', '.select-all', function (e) {
			var dataSelect = $(this).attr("data-select");
			$("."+dataSelect).prop('checked', $(this).prop("checked"));
			
			$("."+dataSelect).on('click', function() {
		        if (!$(this).is(":checked")) {
		            if ($(".select-all[data-select="+dataSelect).is(":checked")) {
		            	$(".select-all[data-select="+dataSelect).prop('checked', $(this).prop("checked"));
		            }
		        }
		    });
	    });
		
		// confirm-delete
		$(document).on('click', '[data-target="#confirm-delete"][data-id]', function(e) {
			$("#confirm-delete #form_id").val($(this).attr("data-id"));
		});
		
		function getCheckedValues() {
			var values = [];
			$('input:checkbox:checked.select-delete').map(function () {
				values.push($(this).attr("data-id"));
			});
			return values;
		}
		
		$("#confirm-delete").on('hide.bs.modal', function() {
			var values = getCheckedValues();
			$("#confirm-delete #form_id").val(values);
		});
		
		// confirm-delete
		$(".table").on('change', '.select-delete, .select-all', function(e) {
			var values = getCheckedValues();
			var qtd = values.length;
			
			if (qtd) {
//				$(".selected-actions").addClass("active");
				$(".selected-actions").collapse('show');
			} else {
//				$(".selected-actions").removeClass("active");
				$(".selected-actions").collapse('hide');
			}
			$(".selected-actions .title").text(qtd+" item"+(qtd == 1 ? "" : "s")+" selecionado"+(qtd == 1 ? "" : "s")+".");
			$("#confirm-delete #form_id").val(values);
		});
		
		// toogle boolean
		$('.toggle-boolean').on('click', function(e) {
			if ($(this).is(":checked")) {
				url = $(this).data('enable');
			} else {
				url = $(this).data('disable');
			}
			$.post(url, {_format: 'json'});
		});
