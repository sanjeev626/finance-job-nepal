<?php
$salutation='';
$orgType =$this->general_model->getById('dropdown','id',$employerInfo->orgtype)->dropvalue;
$ownership =$this->general_model->getById('dropdown','id',$employerInfo->ownership)->dropvalue;
$salutation_arr =$this->general_model->getById('dropdown','id',$employerInfo->salutation);
if(isset($salutation_arr) && !empty($salutation_arr))
    $salutation = $salutation_arr->dropvalue;

$natureoforg = '';
$natureoforg_arr =$this->general_model->getById('dropdown','id',$employerInfo->natureoforg);
if(isset($natureoforg_arr) && !empty($natureoforg_arr))
    $natureoforg = $natureoforg_arr->dropvalue;

//$consalutation =$this->general_model->getById('dropdown','id',$employerInfo->consalutation)->dropvalue;
$consalutation=''
?>
<div class="col-md-9 login-contains">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="My-Profile">
            <div class="personal-detail">
                <h3>Company Detail</h3>
                <ul class="profile-width">
                    <li><strong>Organisation Name :</strong><?php echo $employerInfo->orgname ;?></li>
                    <li><strong>Nature of Organisation :</strong><?php echo $natureoforg;?></li>
                    <li><strong>Organisation Type :</strong><?php echo $orgType;  ?></li>
                    <li><strong>Ownership :</strong><?php echo $ownership;?></li>
                    <li><strong>Organisation Head :</strong><?php echo $salutation .' '.$employerInfo->fname.' '.$employerInfo->mname.' '.$employerInfo->lname;?></li>
                    <li><strong>Designation :</strong><?php echo $employerInfo->designation;?></li>
                </ul>
            </div><!--  personal-detail -->
            <div class="personal-detail">
                <h3>Contact Detail</h3>
                <ul class="profile-width">
                    <li><strong>Address :</strong><?php echo $employerInfo->address;?></li>
                    <li><strong>Phone :</strong><?php echo $employerInfo->phone;?></li>
                    <li><strong>Fax :</strong><?php echo $employerInfo->fax;?></li>
                    <li><strong>P.O.Box :</strong><?php echo $employerInfo->pobox;?></li>
                    <li><strong>Email :</strong><?php echo $employerInfo->email;?></li>
                    <li><strong>Website :</strong><?php echo $employerInfo->website;?></li>
                    <li><strong>Contact Person :</strong><?php echo $employerInfo->contactperson;?></li>
                    <?php /* ?><li><strong>Organization Head :</strong><?php echo $consalutation .' '.$employerInfo->confname.' '.$employerInfo->conmname.' '.$employerInfo->conlname;?></li><?php */ ?>
                </ul>
            </div><!--  personal-detail -->
        </div><!-- My-Profile -->
    </div>
</div><!-- login-contains -->
<style>
    .profile-width li strong {
        width: 40% !important;
    }
</style>