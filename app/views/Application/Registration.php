<?php $this->view("components/Header",$data);?>
 <body>
    <div id="head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="<?=ROOT?>"><img src="<?=ASSETS?>img/product/1.png" class="img-responsive center"  style="max-width:55px;" alt="logo"/></a>
                </div><!--end col div here -->
            </div><!-- end row here -->
        </div><!-- close container -->
    </div>
    <!--- Start Body -->
<div class="container reg__container" style=" padding-bottom: 90px;padding-left: 20px;padding-right: 20px;">
 <p class="fs-4 fw-bold m-0 mt-4 h3 text-center Reg__header" style="font-size:24px"><?=((isset($_SESSION['api']))?'Student Parent Registration Form': 'Student Registration Form')?></p>
    <div class="container" style="margin-top:10px;background:#FFF; border-radius: 5px; max-width:990px; margin:0 auto;padding: 25px;" id="App1">
        <div class="row"> 
        <?php if (isset($_SESSION['api'])) {?> 
            <div class="mini-container login-widget">  
                <p style="text-align:center;">Do you have Both Parent? </p>
                <p style="text-align:center;text-transform: uppercase;font-style: italic;font-weight:bold;">Only one of your parents details is requested. </p>
                <select class="form-control" style="max-width:300px">
                    <option selected="selected" readonly>Select Parent</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                </select>
                <div id="messagediv" class="success success-ico" style="display:none"></div>
                <div id="error" class="error error-ico" style="display:none"></div>
                <div id="check" class="Father box">
                    <form method="POST" class="form-group" autocomplete="off" id="Fatherinfo" action="javascript:void(0)" >
                        <input type="text" id="fid" name="Pid" class="form-control" value="<?=$data['pid']?>" style="display:none" />
                        <input type="text" id="ChildId" value="<?=((isset($_SESSION['userID']))?$_SESSION['userID']:'')?>" style="display:none;"/>
                        <input type="text" name="gender" id="gender" value="Male" style="display:none;"/>
                        <div class="col-md-12">
                            <label for="Father__first__name">Father's First Name:</label>
                            <input type="text" class="form-control" id="Father__first__name" value="" placeholder="Father's Surname"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Father__last__name">Father's Last Name:</label>
                            <input type="text" class="form-control" id="Father__last__name" value="" placeholder="Father's Othername"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Father__last__name">Father's Email Addres:</label>
                            <input type="email" class="form-control" id="Father__email__address" value="" placeholder="Dad@gmail.com"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Father__tel">Father's Mobile Nunber:</label>
                            <input type="tel" class="form-control" id="mobile" value="" placeholder="+(121) 2122-1212-22"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Father__DOB">Father's Date of Birth:</label>
                            <input type="date" class="form-control" id="Father__DOB" value=""/>
                        </div>
                        <div class="col-md-12">
                            <label for="Father__address">Father's House Addres:</label>
                            <input type="text" class="form-control" id="Father__address" value="" placeholder="plot 58, House 20"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Father__profile__photo">Father's Photo:</label>
                            <input type="file" class="form-control" id="Father__profile__photo" />
                        </div>
                         <div class="col-sm-12 col-md-12 col-xs-12  col-gray-dark">
                            <button class="btn btn-primary submit_btn" value="Submit" type="submit">Submit Father(s) Details</button>
                        </div>
                        <br/><br/>
                    </form>
                </div>
                <div id="check" class="Mother box">
                    <form method="POST" class="form-group" autocomplete="off" id="Motherinfo" action="javascript:void(0)"/>
                       <input type="text" id="mid" class="form-control" value="<?=$data['pid']?>" style="display:none" />
                        <input type="text" id="ChildId" value="<?=((isset($_SESSION['userID']))?$_SESSION['userID']:'')?>" style="display:none;"/>
                        <input type="text" name="gender" id="mgender" value="Female" style="display:none;"/>
                        <div class="col-md-12">
                            <label for="Mother__first__name">Mother's First Name:</label>
                            <input type="text" class="form-control" id="Mother__first__name" value="" placeholder="Mother's Surname"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Mother__last__name">Mother's Last Name:</label>
                            <input type="text" class="form-control" id="Mother__last__name" value="" placeholder="Mother's Othername"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Mother__email__address">Mother's Email Addres:</label>
                            <input type="email" class="form-control" id="Mother__email__address" value="" placeholder="Dad@gmail.com"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Mother__tel">Mother's Mobile Nunber:</label>
                            <input type="tel" class="form-control" id="mobile_no" value="" placeholder="+(121) 2122-1212-22"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Mother__DOB">Mother's Date of Birth:</label>
                            <input type="date" class="form-control" id="Mother__DOB" value=""/>
                        </div>
                        <div class="col-md-12">
                            <label for="Mother__address">Mother's House Addres:</label>
                            <input type="text" class="form-control" id="Mother__address" value="" placeholder="plot 58, House 20"/>
                        </div>
                        <div class="col-md-12">
                            <label for="Mother__profile__photo">Mother's Photo:</label>
                            <input type="file" class="form-control" id="Mother__profile__photo" />
                        </div>
                         <div class="col-sm-12 col-md-12 col-xs-12  col-gray-dark">
                            <button class="btn btn-primary submit_btn" value="Submit" type="submit" >Submit Mother(s) Details</button>
                        </div><br/><br/>
                    </form>
                </div>         
            </div>
         <?php } elseif (!isset($_SESSION['api'])) {?>
            <div id="error" class="error error-ico" style="display:none"></div>
            <div id="messagediv" class="success success-ico" style="display:none"></div>
            <form method="POST" class="form-group" autocomplete="off" id="AppRegistration" action="javascript:void(0)"/>
                <input type="text" id="___NewStudentIdNo" name="student__id" class="form-control" value="<?=$data['StudentId'];?>" style="display:none" />
                <input type="text" name="RollNo" id="EnrollmentNumber" value="<?=$data['EnrolNo'];?>" style="display:none;"/>
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0 "> 
                    <div class="col-md-6">
                        <label for="Application Type">Application Type:</label>
                        <select class="form-control" name="Application__Type" id="Application__Type">
                            <option selected="" value="">--Select--</option>
                            <?php foreach ($data['DisplayCateogries'] as $stmt): ?>
                            <option id="<?=$stmt['Category__ID']?>" value="<?=$stmt['Category__ID']?>"> <?=$stmt['Category__name']?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Department Type">Department:</label>
                        <select name="Department__Type" id="Department__Type" class="form-control">
                            <option value=""  selected="">--select--</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="NIN">Program:</label>
                        <select id="Program" name="Program__Type" value="<?=((isset($_POST['Program__Type']))?$_POST['Program__Type']: '');?>" id="Program__Type" class="form-control" />
                            <option selected="selected" value="">--Select--</option>
                            <?php foreach ($data['throw'] as $min): ?>
                            <option value="<?=$min['Program__name']?> "><?=$min['Program__name']?></option>
                            <?php endforeach;?>
                        </select> 
                    </div>
                    <div class="col-md-4"> 
                        <label for="NIN">NIN:</label>
                        <input name="myInput_DRS" class="form-control" id="nin" type="number" value="<?=((isset($_POST['NIN']))?$_POST['NIN']: '');?>" placeholder="NIN:"  autocomplete="off" />
                    </div>
                    <div class="col-md-4"> 
                    <label for="Entry Level">Entry Level:</label>
                    <select class="form-control" name="Entrylevel" id="EtyLevel" value="<?=((isset($_POST['Entrylevel']))?$_POST['Entrylevel']: '');?>">
                            <option selected="selected" value="">--Select--</option>
                            <?php foreach($data['StmtEntrylevel'] as $StmtEntry):?>
                            <option value="<?=$StmtEntry['Entry__level__Name'];?>"><?=$StmtEntry['Entry__level__Name'];?></option>
                                <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0 "> <br/>
                    <p class="gap9"><span class="">Personal Details</span></p>
                    <div class="col-md-6"> 
                        <lable for="Surname">Surname:*</lable>
                        <input type="text" class="form-control" id="surname" value="<?=((isset($_POST['Surname']))?$_POST['Surname']: '');?>" name="Surname"  placeholder="Surname:">
                    </div>
                    <div class="col-md-6"> 
                        <lable for="Other name">Other Name*</lable>
                        <input type="text" id="othername" class="form-control" value="<?=((isset($_POST['othername']))?$_POST['othername']: '');?>" name="othername" placeholder="Other Name" autocomplete="off" />
                    </div>
                    <div class="col-md-6"> 
                        <lable for="Date__of__birth">Date Of Birth*</lable>
                        <input type="date" class="form-control" id="Date__of__birth" value="<?=((isset($_POST['Date__of__birth']))?$_POST['Date__of__birth']: '');?>" name="Date__of__birth" placeholder="Date Of Birth:"  autocomplete="off" />
                    </div>
                    <div class="col-md-6"> 
                        <lable for="">Gender*</lable>
                        <select id="gender" class="form-control" placeholder="Gender" value="<?=((isset($_POST['gender']))?$_POST['gender']: '');?>" name="gender" autocomplete="off" />
                            <option selected="selected" value="">--Select--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-12"> 
                        <lable for="">Email*</lable>
                        <input type="email" class="form-control" id="email" name="email" value="<?=((isset($_POST['email']))?$_POST['email']: '');?>" placeholder="Email:"  autocomplete="off" />
                    </div>
                    <div class="col-md-6"> 
                        <lable for="">Relationship Status*</lable>
                        <select  id="relationship" name="relationship" value="<?=((isset($_POST['relationship']))?$_POST['relationship']: '');?>" class="form-control" autocomplete="off">
                            <option selected="selected" value="">--Select--</option>
                            <option value="Divored">Divored</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Complicated">Complicated</option>
                        </select>
                    </div>
                    <div class="col-md-6"> 
                        <lable for="Telephone">Tel*</lable>
                        <input type="tel" class="form-control" id="mobile" name="telephone" value="<?=((isset($_POST['telephone']))?$_POST['telephone']: '');?>" placeholder="+(234) 8032 4552 09"  autocomplete="off" />
                    </div>
                    <div class="col-md-12"> 
                        <label for="Session">Session:</label>
                            <select list="sessionList" class="form-control" name="session" id="session" value="<?=((isset($_GET['Edit']))?trim(filter_var($Hat)) : trim(filter_var($_POST['session'], FILTER_SANITIZE_STRING)))?>">
                                <option selected="selected" value="">--Select--</option>
                                <?php foreach ($data['StmtSession'] as $session): ?>
                                <option value="<?=$session['session'];?>"><?=$session['session'];?></option>
                            <?php endforeach;?>
                            </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xs-12  col-gray-dark">
                        <button class="btn btn-primary submit_btn" value="Signup" type="submit" style="width: 50%">Register Now</button>
                    </div>
                </div>
            </form>
        <?php }?>
        </div>
    </div>
</div>
<?php $this->view("components/Footer",$data); ?>