							<div class="row">
								<div class="col-lg-auto">
									<button type="button" class="btn btn-sm btn-primary border-white mb-2" data-toggle="modal" data-target="#ModalInput"><i class="fa fa-plus"></i><b> Input Komoditas</b></button>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table id="TabelKomoditas" class="table table-sm table-bordered bg-light">
											<thead>
												<tr class="bg-danger text-light">
													<th scope="col" style="width: 4%;" class="text-center align-middle">No</th>
													<th scope="col" style="width: 15%;" class="align-middle">Nama Komoditas</th>
													<th scope="col" style="width: 20%;" class="align-middle">Nama Foto</th>
													<th scope="col" style="width: 20%;" class="text-center align-middle">Foto Komoditas</th>
													<th scope="col" style="width: 15%;" class="text-center align-middle">Pohon Industri</th>
													<th scope="col" style="width: 10%;" class="text-center align-middle">Edit</th>
												</tr>
											</thead>
											<tbody id="RekapSurvei">
												<?php $No = 1; foreach ($Komoditas as $key) { ?>
													<tr>
														<th scope="row" class="text-center align-middle"><?=$No++?></th>
														<th scope="row" class="align-middle"><?=$key['Nama']?></th>
														<th scope="row" class="align-middle"><?=$key['Foto']?></th>
														<th scope="row" class="text-center align-middle">
															<button LihatFoto="<?=$key['Nama']."$".$key['Foto']?>" class="btn btn-sm btn-success LihatFoto"><i class="fa fa-eye"> <b>Lihat Foto Komoditas</b></i></button>	
														</th>
														<th scope="row" class="text-center align-middle">
															<button Komoditas="<?=$key['Id']?>" class="btn btn-sm btn-primary Komoditas"><i class="fa fa-eye"> <b>Lihat Pohon Industri</b></i></button>	
														</th>
														<th scope="row" class="text-center align-middle">
															<button Edit="<?=$key['Id']."$".$key['Nama']."$".$key['Foto']?>" class="btn btn-sm btn-warning Edit"><i class="fa fa-edit"></i></button>
															<button Hapus="<?=$key['Id']."$".$key['Foto']?>" class="btn btn-sm btn-danger Hapus"><i class="fa fa-trash"></i></button>
														</th>
													</tr>
												<?php } ?>  
											</tbody>
										</table>
									</div>
								</div>
							</div>
            </div>
          </div> 
        </div>
        <!-- /page content -->
      </div>
		</div>
		<div class="modal fade" id="ModalInput">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
								<div class="col-12">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Nama Komoditas</b></span>
                    </div>
                    <input type="text" class="form-control" id="InputNamaKomoditas" placeholder="Nama Komoditas"> 
                  </div>
								</div>
								<div class="col-12">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Input Foto</b></span>
                    </div>
                    <input type="file" class="form-control" id="InputFileFoto"> 
                  </div>
								</div>
								<div class="col-12">
									<div class="input-group input-group-sm mb-1">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary text-white"><b>JSON<br>Pohon<br>Industri</b></span>
										</div>
										<textarea class="form-control" id="InputJsonKomoditas" rows="7"></textarea>
									</div>
								</div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-primary" id="Input"><b>Simpan</b></button>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalEdit">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
								<div class="col-12">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Nama Komoditas</b></span>
                    </div>
										<input type="text" class="form-control" id="EditNamaKomoditas"> 
										<input type="hidden" class="form-control" id="Id">
										<input type="hidden" class="form-control" id="EditFotoLama"> 
                  </div>
								</div>
								<div class="col-12">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Input Foto</b></span>
                    </div>
                    <input type="file" class="form-control" id="EditFileFoto"> 
                  </div>
								</div>
								<div class="col-12">
									<div class="input-group input-group-sm mb-1">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary text-white"><b>JSON<br>Pohon<br>Industri</b></span>
										</div>
										<textarea class="form-control" id="EditJsonKomoditas" rows="7"></textarea>
									</div>
								</div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-primary" id="Edit"><b>Simpan</b></button>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalKomoditas" tabindex="-1" role="dialog" aria-labelledby="ModalKomoditasTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold text-primary text-center" id="JudulKomoditas">Pohon Industri Komoditas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
          </div>
          <div class="modal-body overflow-auto" style="height: 80vh;">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div id="PohonIndustri" style="text-align: center;"></div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalFoto" tabindex="-1" role="dialog" aria-labelledby="ModalFotoTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold text-primary text-center" id="NamaFoto">Foto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
          </div>
          <div class="modal-body overflow-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 text-center">
                  <img id="Foto" class="img-fluid" width="300">
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url("vendors/jquery/dist/jquery.min.js")?>"></script>
   	<script src="<?=base_url("vendors/bootstrap/dist/js/bootstrap.bundle.min.js")?>"></script>
		<script src="<?=base_url("build/js/custom.min.js")?>"></script>
		<script src="<?=base_url("assets/datatables/jquery.dataTables.js")?>"></script>
		<script src="<?=base_url("assets/datatables-bs4/js/dataTables.bootstrap4.js")?>"></script>
		<script src="<?=base_url("assets/js/orgchart.js")?>"></script>
		<script>
			$(document).ready(function(){
				var BaseURL = '<?=base_url()?>'  
				$('#TabelKomoditas').DataTable( {
					"ordering": true,
					"bInfo" : false,
					"lengthMenu": [[10, 30, 50, -1], [10, 30, 50, "All"]],
					"language": {
						"paginate": {
							'previous': '<b class="text-white"><</b>',
							'next': '<b class="text-white">></b>'
						}
					}
				})

				$(document).on("click",".LihatFoto",function(){
					var Pisah = $(this).attr('LihatFoto').split("$")
					$("#NamaFoto").html("Foto "+Pisah[0])
					$("#Foto").attr('src','../Komoditas/'+Pisah[1]);
					$("#ModalFoto").modal('show')
				})

				$(document).on("click",".Komoditas",function(){
					$.post(BaseURL+"Sikomo/GetKomoditas/"+$(this).attr('Komoditas')).done(function(Respon) {
						var Data = JSON.parse(Respon)
						$("#JudulKomoditas").html("Produk Turunan Komoditas "+Data.Nama)
						var datascource = JSON.parse(Data.Turunan)
						$('#PohonIndustri').empty();
						$('#PohonIndustri').orgchart({
							'visibleLevel': 2,
							'data' : datascource,
							'createNode': function($node, data) {
								$node.on('click', function(event) {
									if (!$(event.target).is('.edge, .toggleBtn')) {
										var $this = $(this);
										var $chart = $this.closest('.orgchart');
										var newX = window.parseInt(($chart.outerWidth(true)/2) - ($this.offset().left - $chart.offset().left) - ($this.outerWidth(true)/2));
										var newY = window.parseInt(($chart.outerHeight(true)/2) - ($this.offset().top - $chart.offset().top) - ($this.outerHeight(true)/2));
										$chart.css('transform', 'matrix(1, 0, 0, 1, ' + newX + ', ' + newY + ')');
									}
								});
							}
						});
						$("#ModalKomoditas").modal('show')
					})
				})
				
				$("#Input").click(function() {
					var File = $('#InputFileFoto')[0].files[0]
					var ValidImageTypes = ["image/jpg","image/jpeg"]
					var FileType = File["type"]
					if ($("#InputNamaKomoditas").val() == "") {
						alert("Mohon Input Nama Komoditas")
					} else if (File == undefined) {
						alert("Wajib Input Foto Komoditas")
					} else if ($.inArray(FileType, ValidImageTypes) < 0) {
						alert("Input Foto Wajib jpg")
					} else if ($("#InputJsonKomoditas").val() == "") {
						alert("Mohon Input JSON Pohon Industri")
					} else {
						var fd = new FormData()
						fd.append('FileFoto',$('#InputFileFoto')[0].files[0])
						fd.append('Nama',$("#InputNamaKomoditas").val())
						fd.append('Turunan',$("#InputJsonKomoditas").val())
						$.ajax({
							url: BaseURL+'Admin/Input',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/Komoditas"
								}
								else {
									alert(Respon)
								}
							}
						})
					}	
				})

				$(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("$")
					$("#Id").val(Pisah[0])
					$("#EditNamaKomoditas").val(Pisah[1])
					$("#EditFotoLama").val(Pisah[2])
					$.post(BaseURL+"Admin/GetTurunan/"+Pisah[0]).done(function(Respon) {
						$('#EditJsonKomoditas').html(Respon);
						$("#ModalEdit").modal('show')
					})
				})

				$("#Edit").click(function() {
					var fd = new FormData()
					fd.append('Id',$("#Id").val())
					fd.append('Nama',$("#EditNamaKomoditas").val())
					fd.append('Turunan',$("#EditJsonKomoditas").val())
					fd.append("FotoLama", $('#EditFotoLama').val())
					var File = $('#EditFileFoto')[0].files[0]
					if (File != undefined) {
						var FileType = File["type"]
						var ValidImageTypes = ["image/jpg", "image/jpeg"]
						if ($.inArray(FileType, ValidImageTypes) < 0) {
							alert("Input Foto Wajib jpg")
							$('#EditFileFoto').val("")
							return
						} else {
							fd.append('Foto',$('#EditFileFoto')[0].files[0])
						}	
					}
					$.ajax({
						url: BaseURL+'Admin/Edit',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Admin/Komoditas"
							}
							else {
								alert(Respon)
							}
						}
					})
				})

				$(document).on("click",".Hapus",function(){
					var Data = $(this).attr('Hapus').split("$")
					var Hapus = { Id: Data[0],
											  Foto: Data[1] }
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Admin/Hapus", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/Komoditas"
							} else {
								alert(Respon)
							}
						})
					}
				})
			})
		</script>
  </body>
</html>