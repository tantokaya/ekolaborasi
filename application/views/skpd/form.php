<script type="text/javascript">
    $(document).ready(function(){
        $("#code").focus();

        $("#code").autocomplete({
            source: function(request,response) {
                $.ajax({
                    url: "<?php echo site_url('ref_json/ListSkpd'); ?>",
                    data: { id: $("#code").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                        response(data);
                    }
                });
            },
        });

        $("#code").keyup(function(e){
            var isi = $(e.target).val();
            $(e.target).val(isi.toUpperCase());
            CariDataSkpd();
        });

        function CariDataSkpd(){
            var code = $("#code").val()
            $.ajax({
                type	: 'POST',
                url		: "<?php echo site_url(); ?>/ref_json/InfoSkpd",
                data	: "code="+code,
                cache	: false,
                dataType : "json",
                success	: function(data){
                    $("#name").val(data.skpd_name);
                    $("#desc").val(data.skpd_desc);
                    $("#lead").val(data.username);
                }
            });
        }


        $("#simpan").click(function(){
            var code	= $("#code").val();
            var name	= $("#name").val();
            var desc	= $("#desc").val();

            var string = $("#form").serialize();

            if(code.length==0){
                $("#code").focus();
                return false();
            }
            if(name.length==0){
                $("#name").focus();
                return false();
            }

            $.ajax({
                type	: 'POST',
                url		: "<?php echo site_url(); ?>/skpd/simpan",
                data	: string,
                cache	: false,
                success	: function(data){
                    window.location.href = "<?php echo site_url(); ?>/skpd";
                }
            });
            return false();
        });

    });
</script>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"></i> Form SKPD</h3>
            </div>
            <div class="box-content nopadding">
                <form name="form" id="form" class='form-horizontal form-bordered'>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Kode SKPD</label>
                        <div class="controls">
                            <input type="text" name="code" id="code" placeholder="Kode SKPD.." class="input-large" value="<?php echo $code; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Nama SKPD</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" placeholder="Nama SKPD..." class="input-xlarge" value="<?php echo $name; ?>">
                        </div>
                    </div>
					<!--
                    <div class="control-group">
                        <label for="textfield" class="control-label">Nama Kepala SKPD</label>
                        <div class="controls">
                            <input type="text" name="kp" id="kp" placeholder="Nama Kepala SKPD..." class="input-xlarge" value="<?php echo $kp; ?>">
                        </div>
                    </div>
					-->
					<div class="control-group">
                        <label for="textfield" class="control-label">Nama Kepala SKPD</label>
                        <div class="controls">
							<div class="input-xlarge">
                                <select name="lead" id="lead" class="chosen-select" required="true">
                                    <?php
                                    if(empty($lead)){
                                        ?>
                                        <option value="">-PILIH-</option>
                                    <?php
                                    }
                                    foreach($l_lead->result() as $db){
                                        if($lead==$db->username){
                                            ?>
                                            <option value="<?php echo $db->username;?>" selected="selected"><?php echo $db->nama_lengkap;?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $db->username;?>"><?php echo $db->nama_lengkap;?></option>
                                        <?php }
                                    } ?>
                                </select>
							</div>
                        </div>
                    </div>
					<!--
                    <div class="control-group">
                        <label for="textfield" class="control-label">Nama PM</label>
                        <div class="controls">
                            <input type="text" name="pm" id="pm" placeholder="PM..." class="input-xlarge" value="<?php echo $pm; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="textfield" class="control-label">Nama CE</label>
                        <div class="controls">
                            <input type="text" name="ce" id="ce" placeholder="CE..." class="input-xlarge" value="<?php echo $ce; ?>">
                        </div>
                    </div>
					-->
                    <div class="control-group">
                        <label for="textfield" class="control-label">Keterangan</label>
                        <div class="controls">
                            <textarea name="desc" id="desc" rows="5" class="input-block-level"><?php echo $desc; ?></textarea>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="button"  id="simpan" class="btn btn-primary"><i class="icon-save"></i> Simpan</button>
                        <button type="reset" class="btn"><i class="icon-undo"></i> Batal</button>
                        <a href="<?php echo base_url();?>index.php/skpd">
                            <button type="button" class="btn btn-red"><i class="icon-power-off"></i> Tutup</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
