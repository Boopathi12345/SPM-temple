@extends('layouts.frontend')

@section('pagestyles')
<link rel="stylesheet" href="{{URL::asset('assets\familytree.css')}}">
<style>
.video_align{
    width:100%;
    height: 250px !important;
}
.vido_img_align{
    width: 100%;
    height: 250px;
}
.select_in{
    width: 120px;
    height: 39px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
}
.select_in:focus{
    border-color: #0d6efd;
}
.btn_focus:focus {
  outline: none;
  box-shadow: none;
}
.btn_focus{
	box-shadow: none !important
}

.padding--top{
    padding-top: 100px;
}
.btn-outline-primary {
    color: #f58220 !important;
    border-color: #fd760d !important;
}
.btn-check:active+.btn-outline-primary, .btn-check:checked+.btn-outline-primary, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show, .btn-outline-primary:active {
    color: #fff !important;
    background-color: #fd870dde !important;
    border-color: #fd760d !important;
}
.btn-outline-primary:hover {
    color: #fff !important;
    background-color: #fd440de8 !important;
    border-color: #fd4a0de6 !important;
}
.tree li a {
    border: 1px solid #0e5bdb!important;
    padding: 5px 10px!important;
}
</style>

@stop

@section('content')


    <!-- ================> Cause section start here <================== -->
    <div class="cause padding--top padding--bottom bg-img" style="background: url(assets/images/bg-img/08.jpg) rgba(0,0,0,.4);display:none;">
        <div class="container">
            <div class="section__header text-center">
                <h2 class="text-white">Urgent Causes</h2>
            </div>
            <div class="section__wrapper">
                <div class="cause__top row justify-content-center g-4 row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>82.5%</h3>
                                <h6>Founded</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>$ 1650</h3>
                                <h6>Donate</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>$ 2000</h3>
                                <h6>Goal</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>10</h3>
                                <h6>Donator</h6>
                            </div>
                        </div>
                    </div>
                    <div class="cause__item">
                        <div class="cause__inner">
                            <div class="cause__content">
                                <h3>60</h3>
                                <h6>Day to go</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cause__bottom">
                    <div class="cause__bars">
                        <div class="donaterange__content text-center">
                            <h4><span>66% Donated </span> / $10,013 To Go</h4>
                            <div class="donaterange__bars" data-percent="60%">
                                <div class="donaterange__bar"></div>
                            </div>
                            <a href="causes.html" class="default-btn move-right"><span>Donate <i class="fas fa-heart"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================> Cause section end here <================== -->

	<div class="card-body padding--top" style="overflow: auto;">
							<div class="card-title display-inline">
								<!-- <h4 class="mb-0 leave_add_res_title text-center">Poosari Family Tree</h4> -->
                                <div class="card-title display-inline section__header text-center">
                <h2 class="">Poosari Family Tree</h2>
            </div>
</div>
<div class="text-center">
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
<input type="radio" class="btn-check button_click active_api_run" name="btnradio" id="btnradio1" onclick=" fullvalue('all')" checked="" autocomplete="off">
                <label class="btn btn_focus btn-outline-primary" for="btnradio1">Full family</label>
                <input type="radio" class="btn-check button_click" name="btnradio" id="btnradio2" onclick="fullvalue('1')" autocomplete="off">
                <label class="btn btn_focus btn-outline-primary" for="btnradio2">This year poosari</label>
              </div>
              <select name="" id="" class="select_in" onchange="fullvalue(this.value)">
                  <option value="1">2021</option>
                  <option value="2">2022</option>
                  <option value="3">2023</option>
                  <option value="4">2024</option>
                  <option value="5">2025</option>
                  <option value="6">2026</option>
                  <option value="7">2027</option>
                  <option value="8">2028</option>
                  <option value="9">2029</option>
                  <option value="10">2030</option>
                  <option value="11">2031</option>
                  <option value="12">2032</option>
                  <option value="13">2033</option>
                  <option value="14">2034</option>
                  <option value="15">2035</option>
                  <option value="16">2036</option>
                  <option value="17">2037</option>
                  <option value="18">2038</option>
                  <option value="19">2039</option>
                  <option value="20">2040</option>
                  <option value="21">2041</option>
                  <option value="22">2042</option>
                  <option value="23">2043</option>
                  <option value="24">2044</option>
                  <option value="25">2045</option>
                  <option value="26">2046</option>
                  <option value="27">2047</option>
                  <option value="28">2048</option>
                  <option value="29">2049</option>
                  <option value="30">2050</option>
                  <option value="31">2051</option>
                  <option value="32">2052</option>
                  <option value="33">2053</option>
                  <option value="34">2054</option>
                  <option value="35">2055</option>
                  <option value="36">2056</option>
                  <option value="37">2057</option>
                  <option value="38">2058</option>
                  <option value="39">2059</option>
                  <option value="40">2060</option>
              </select>

</div>


							<div class="pt-wrapper" style="overflow: auto;">
                                    <div class="pt-tree">
    <div class="pt-sm">

                <div class="tree poosari_family">


        </div></div>
		</div></div>


					</div>
				</div>




@endsection

@section('pageScript')

<script>
    fullvalue('all');

function fullvalue(user_value){

     $.ajax({
        type: "get",
        // data:{user_id:ID},
        url: "/api/Poosarisview",
        success: function(data) {
            console.log(data);
            $(".poosari_family").html(" ");

            $.each(data, function(key, val) {
                if(val.child_number==0){
                    $(".poosari_family").append('<ul ><li class="tree'+val.id+'"><a rel="item-264">'
                    +'<div class="pt-thumb">'
                    +'<img src="{{URL::asset("poosari")}}/'+val.photo+'" style="width: 100%; height: 100%;">'
                    +'</div>'
                    +'<strong class="text_overflow">'+val.name+'</strong><span class="text_overflow">'+val.phone+'</a></li></ul>');
                }

                    var child=$(".tree"+val.child_number+">ul").html();
                    // console.log(child);

                    if(child){
                        $('.tree'+val.child_number+">ul").append('<li class="tree'+val.id+'"><a rel="item-264">'
                    +'<div class="pt-thumb">'
                    +'<img src="{{URL::asset("poosari")}}/'+val.photo+'" style="width: 100%; height: 100%;">'
                    +'</div>'
                    +'<strong class="text_overflow">'+val.name+'</strong><span class="text_overflow">'+val.phone+'</span></a></li>');
                    }else{
                        $('.tree'+val.child_number).append('<ul ><li class="tree'+val.id+'"><a rel="item-264">'
                    +'<div class="pt-thumb">'
                    +'<img src="{{URL::asset("poosari")}}/'+val.photo+'" style="width: 100%; height: 100%;">'
                    +'</div>'
                    +'<strong class="text_overflow">'+val.name+'</strong><span class="text_overflow">'+val.phone+'</span></a></li></ul>');
                    }



            });
            if(user_value=='all'){
                $(".select_in").hide();
            }else{
                selectvalue('0',user_value);
             $(".select_in").show();
             $(".select_in").val(user_value);
            }
        }
    });
}

function selectvalue(userid,count_num){
    if(userid!='0'){

      var UserFullvalue = [];
      $('.'+userid+'>ul>li').each(function(i)
      {
        UserFullvalue.push($( this ).attr('class'));
      });
      console.log(UserFullvalue);
if(count_num=='0'){Count_Val=count_num+1;}else{Count_Val=count_num+1;}

      Persan_va=Count_Val % UserFullvalue.length;
      var Count_va=Math.floor(Count_Val/UserFullvalue.length);
       console.log(Persan_va,Count_va);

       if(Persan_va=='0'){
       Count_full_va=Count_va;
       Persan_full_va=UserFullvalue.length-1;
       }else{
        Count_full_va=Count_va;
        Persan_full_va=Persan_va-1;
       }

       var ul_value= $('.'+UserFullvalue[Persan_full_va]+">ul").html();
       $("."+UserFullvalue[Persan_full_va]).siblings().remove();
       if(ul_value){
        console.log("ggggg"+UserFullvalue[Persan_full_va]);
        selectvalue(UserFullvalue[Persan_full_va],Count_full_va);
       }else{
         console.log("over"+UserFullvalue[Persan_full_va]);
       }



    }else{
        // alert("kuggbuyg");
      Useryear=count_num;
    var firstvalue = [];
    $('.tree1>ul>li').each(function(i)
    {
      firstvalue.push($( this ).attr('class'));
    });
    console.log(firstvalue);
    persan= Useryear % firstvalue.length;
    var count=Math.floor(Useryear / firstvalue.length);
     console.log(persan,count);

     if(persan=='0'){
     countvalue=count;
     persanvalue=firstvalue.length-1;
     }else{
      countvalue=count;
     persanvalue=persan-1;
     }

     var ul_value= $('.'+firstvalue[persanvalue]+">ul").html();
     $("."+firstvalue[persanvalue]).siblings().remove();
     if(ul_value){
      console.log(firstvalue[persanvalue]);

      selectvalue(firstvalue[persanvalue],countvalue);
     }else{
       console.log("over"+firstvalue[persanvalue]);
     }

    }
  }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.3.0/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
@stop
