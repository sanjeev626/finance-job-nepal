<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>

    <!--<style media="print">-->
    <style >

        ::selection{ background-color: #E13300; color: white; }
        ::moz-selection{ background-color: #E13300; color: white; }
        ::webkit-selection{ background-color: #E13300; color: white; }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 26px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
            text-align: center;
        }
        h2{
            color: #444;
            font-size: 19px;
            font-weight: normal;
        }



        #container{
            margin: 10px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }

    </style>
</head>
<body>

<div id="container">
    <h1 >Curriculam Vitae</h1>
    <table width="100%">
        <tr>
            <td width="70%">
                <h2 >Basic Info</h2>
                <p>Name : <?php echo $basicInfo->fname.' '.$basicInfo->mname.' '.$basicInfo->lname?></p>
                <p>Cell No: <?php echo $basicInfo->phone_cell?></p>
                <p>Email: <?php echo $basicInfo->email?></p>
                <p>Address: <?php echo $basicInfo->address_current?></p>
            </td>
            <td width="30%">
                <?php if(!empty($basicInfo->profile_picture)){?>
                    <img src="<?php echo base_url().'uploads/jobseeker/'.$basicInfo->profile_picture;?>" alt="" width="100px">
                <?php }else{?>
                    <img src="<?php echo base_url()?>content_home/img/boy.png"/>
                <?php } ?>
            </td>
        </tr>
    </table>

    <?php if($education_detail){?>
    <table width="100%">
        <tr>
            <td colspan="2">
                <h2> Education</h2>
            </td>
        </tr>
        <?php
            foreach($education_detail as $ed)
            {

//                echo '<tr><td width="30%">Degree:</td><td width="70%"><h4>'.$ed->degree.'</h4></td></tr>';
                echo '<tr><td width="30%">Program:</td><td width="70%"><h4>'.$ed->education_program.'</h4></td></tr>';
                echo '<tr><td width="30%">Board:</td><td width="70%">'.$ed->board.'</td></tr>';
                echo '<tr><td width="30%">Instution:</td><td width="70%">'.$ed->instution.'</td></tr>';
                echo '<tr><td width="30%">'.$ed->marks_secured_in.':</td><td width="70%">'.$ed->marks_secured.'</td></tr>';
                echo '<tr><td width="30%"></td><td width="70%"></td></tr>';
            }
        ?>

    </table>
    <?php }?>
    <?php if($training_detail){?>
    <table width="100%">
        <tr>
            <td colspan="2">
                <h2> Trainings</h2>
            </td>
        </tr>
        <?php
        foreach($training_detail as $td)
        {

            echo '<tr><td width="30%">Institution:</td><td width="70%"><h4>'.$td->institution.'</h4></td></tr>';
            echo '<tr><td width="30%">Course:</td><td width="70%">'.$td->course.'</td></tr>';
            echo '<tr><td width="30%">From:</td><td width="70%">'.$td->frommonth.'/'.$td->fromyear.'</td></tr>';
            echo '<tr><td width="30%">To:</td><td width="70%">'.$td->tomonth.'/'.$td->toyear.'</td></tr>';
            echo '<tr><td width="30%"></td><td width="70%"></td></tr>';
        }
        ?>

    </table>
    <?php }?>
    <?php if($experience_detail){?>
    <table width="100%">
        <tr>
            <td colspan="2">
                <h2> Work Experience</h2>
            </td>
        </tr>
        <?php
        foreach($experience_detail as $exd)
        {

            echo '<tr><td width="30%">Company:</td><td width="70%"><h4>'.$exd->company.'</h4></td></tr>';
            echo '<tr><td width="30%">Title:</td><td width="70%">'.$exd->title.'</td></tr>';
            echo '<tr><td width="30%">Position:</td><td width="70%">'.$exd->position.'</td></tr>';
            echo '<tr><td width="30%">From:</td><td width="70%">'.$exd->frommonth.'/'.$exd->fromyear.'</td></tr>';
            echo '<tr><td width="30%">To:</td><td width="70%">'.$exd->tomonth.'/'.$exd->toyear.'</td></tr>';
            echo '<tr><td width="30%">Roles:</td><td width="70%">'.$exd->roles_and_responsibilities.'</td></tr>';
            echo '<tr><td width="30%"></td><td width="70%"></td></tr>';
        }
        ?>

    </table>
    <?php }?>
    <?php if($language_detail){?>
    <table width="100%">
        <tr>
            <td colspan="5">
                <h2> Languages </h2>
            </td>
        </tr>
        <tr>
            <th>Language</th>
            <th>Reading</th>
            <th>Writing</th>
            <th>Speaking</th>
            <th>Listining</th>
        </tr>
        <?php
        foreach($language_detail as $ld)
        {

            echo '<tr>';
            echo '<td>'.$ld->lang.'</td>';
            echo '<td>'.$ld->reading.'</td>';
            echo '<td>'.$ld->writing.'</td>';
            echo '<td>'.$ld->speaking.'</td>';
            echo '<td>'.$ld->listening.'</td>';
            echo '</tr>';

        }
        ?>

    </table>
    <?php }?>
    <?php if($reference_detail){?>
    <table width="100%">
        <tr>
            <td colspan="2">
                <h2> References</h2>
            </td>
        </tr>
        <?php
        foreach($reference_detail as $rd)
        {

            echo '<tr><td width="30%">Organization Name:</td><td width="70%"><h4>'.$rd->organization_name.'</h4></td></tr>';
            echo '<tr><td width="30%">Name:</td><td width="70%">'.$rd->reference_name.'</td></tr>';
            echo '<tr><td width="30%">Position:</td><td width="70%">'.$rd->position.'</td></tr>';
            echo '<tr><td width="30%">Contact Np:</td><td width="70%">'.$rd->mobile_number.'</td></tr>';
            echo '<tr><td width="30%">Email:</td><td width="70%">'.$rd->email.'</td></tr>';

            echo '<tr><td width="30%"></td><td width="70%"></td></tr>';
        }
        ?>

    </table>
    <?php }?>
</div>

</body>
</html>