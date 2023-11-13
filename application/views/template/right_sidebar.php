<!-- Right Sidebar -->
<div class="side-bar right-bar nicescroll">
    <h5 class="text-center">ANNEES ACADEMIQUES</h5>
    <div class="contact-list nicescroll">
        <ul class="list-group contacts-list">
            
            <?php
           	if($this->session->ans_cur != $this->session->ans)
            {
            ?>
                <form method="post" id="frm_0" action="<?php base_url();?>dashboard">
                <input type="hidden" name="annee_select" value="<?php echo $this->session->ans."bks".$this->session->libelle_annee; ?>">
                <li class="list-group-item">
                    <a href="#" onClick="$('#frm_0').submit();">
                        <div class="row">
                            <div class="col-xs-2"><i class="fa fa-circle online"></i></div>
                            <div class="col-xs-6"><span class="name"><strong><?php echo $this->session->libelle_annee; ?></strong></span></div>
                        </div>    
                    </a>
                    <span class="clearfix"></span>
                </li>
                </form>
                
                
            <?php
            }
			 
            $nf = 1;
           	foreach($this->session->an_archiv as $an)
            {
            ?>
				<form method="post" id="frm_<?php echo $nf;?>" action="<?php base_url();?>dashboard">
                <input type="hidden" name="annee_select" value="<?php echo $an->code_annee."bks".$an->libelle_annee; ?>">
                <li class="list-group-item">
                    <a href="#" onClick="$('#frm_<?php echo $nf;?>').submit();">
                        <div class="row">
                            <div class="col-xs-2"><i class="fa fa-circle offline"></i></div>
                            <div class="col-xs-6"><span class="name"><strong><?php echo $an->libelle_annee; ?></strong></span></div>
                        </div>    
                    </a>
                    <span class="clearfix"></span>
                </li>
               
            <?php
				$nf ++;
            }
            ?>
            
        </ul>  
    </div>
</div>
<!-- /Right-bar -->