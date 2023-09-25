$(document).on('keypress','#barcode',function(e){
	// console.log('barcode_sparepart_code on keypress');

	if(e.keyCode==13){
		 e.preventDefault();
	}
});

$(document).ready(function() {
	$('#tables').DataTable({
		responsive: true
	});
});

$(document).ready(function(){
	$("#f_satuan").validate({
		rules: {
			satuan: {
				required: true
			}
		}
	});
});

$(document).ready(function(){
	$("#login").validate({
		rules: {
			username: {
				required: true
			},
			password: {
				required: true
			}
		}
	});
});

$(document).ready(function(){
	$("#supplier").validate({
		rules: {
			nama: {
				required: true
			},
			alamat: {
				required: true
			},
			telp: {
				required: true,
				digits: true
			}
		}
	});
});

$(document).ready(function(){
	$("#pelanggan").validate({
		rules: {
			nama: {
				required: true
			},
			alamat: {
				required: true
			},
			telp: {
				required: true,
				digits: true
			}
		}
	});
});

$(document).ready(function(){
	$("#barang").validate({
		rules: {
			barcode: {
				required: true
			},
			nama: {
				required: true
			},
			stok: {
				required: true,
				digits: true
			},
			satuan: {
				required: true
			},
			beli: {
				required: true,
				digits: true
			},
			jual: {
				required: true,
				digits: true
			},
			keuntungan: {
				required: true,
				digits: true
			},
			kategori: {
				required: true
			}
		}
	});
});

$(document).ready(function(){
	$("#kategori").validate({
		rules: {
			nama: {
				required: true
			},
			deskripsi: {
				required: true
			}
		}
	});
});

$(document).ready(function(){
	$("#karyawan").validate({
		rules: {
			nama: {
				required: true
			},
			alamat: {
				required: true
			},
			telp: {
				required: true,
				digits: true
			},
			jabatan: {
				required: true
			}
		}
	});
});