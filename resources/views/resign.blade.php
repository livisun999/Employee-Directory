@extends('layouts.index')

@section('title', 'Resign')
<div class="container">
    <div class="row">
        <h1> Resign </h1>
        <form action="" method="post" id="form_resign" class="form-horizontal">
            <div class="input_left col-sm-6">
                <div class="form-group input_user ">
                    <label for="username" class="col-lg-offset-1 col-sm-3 control-label"> Username </label>
                <div class="col-sm-7">
                    <input type="text" name="username" id="username" class="form-control" placeholder="UserName">
                </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-offset-1 col-sm-3 control-label"> Password </label>
                    <div class="col-sm-7">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Re-password" class="col-lg-offset-1 col-sm-3 control-label"> Re-Password </label>
                    <div class="col-sm-7">
                        <input type="password" name="Re-password" id="Re-password" class="form-control" placeholder="Re-Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-offset-1 col-sm-3 control-label"> Email </label>
                    <div class="col-sm-7">
                        <input type="email" name="email" id="email" class="form-control" placeholder="your Email">
                    </div>
                </div>




            </div>
            <div class="input_right col-sm-6">
                <div class="form-group input_user">
                    <label for="YourName" class="col-lg-offset-1 col-sm-3 control-label"> Your Name </label>
                    <div class="col-sm-7">
                        <input type="text" name="yourName" id="YourName" class="form-control" placeholder="your Name">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="Phone_number" class="col-lg-offset-1 col-sm-3 control-label"> Phone Number </label>
                    <div class="col-sm-7">
                        <input type="text" name="Phone_number" id="Phone_number" class="form-control" placeholder="your Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="DoB" class="col-sm-3 col-lg-offset-1 control-label">Date Of Birdth </label>
                    <div class="col-sm-5 selectContainer">
                        <select name="DoB" id="DoB" class="DoB ">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <select name="DoB" id="DoB" class="DoB ">
                            <option> 1 </option>
                            <option> 1 </option>
                        </select>
                        <select name="DoB" id="DoB" class="DoB ">
                            <option> 1 </option>
                            <option> 1 </option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="Rd_Sex" class="col-lg-offset-1 col-sm-3 control-label"> Sex </label>
                    <div class="col-sm-7" name="Rd_Sex" id="Rd_Sex">
                        <input type="radio" name="Rd_S" id="Rd_boy" class="Rd_boy radio-inline" value="boy"> Boy
                        <input type="radio" name="Rd_S" id="Rd_girl" class="Rd_girl radio-inline" value="girl"> Girl
                        <input type="radio" name="Rd_S" id="diff_" class="diff_ radio-inline" value="diff_"> #
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-9">
                    <button type="reset" class="btn btn-default"> Reset </button>
                    <button type="submit" class="btn btn-primary"> Resign </button>
                </div>
            </div>
        </form>
    </div>
</div>