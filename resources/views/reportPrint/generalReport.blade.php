<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>PDF</title>
{{--
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  --}}  

    <style>
        #items tr{border:1px solid #000000;}
        #items tbody tr td{border:1px solid #000000;}
        #items thead td{background-color:#231F20;color:#FFFFFF;}

        .header { position: fixed; left: 0px; top: -40px; right: 0px;}
        .footer { position: fixed; left: 0px; bottom: 200px; right: 0px;}
         .page {
        size: A4 landscape;}
    }
    </style>


</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-3" style="font-family: 'Libre Barcode 128', cursive; font-size: 35px;padding: 10px 0px 0px 0px;">{{$user->company_code}}</div>
        <div class="col-xs-9">
        <table cellspacing='0' cellpadding='5' style="border-width: 0 !important;padding:0px 0px 0px 60px;">
            <tr>
                <td style="padding: 5px;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(storage_path('app/public/logo/logo.jpg'))) }}" width="80px" height="60px"></td>
                <td>
                    <table style="text-align: center;style='width:45%'">
                        <tr><strong>{{$property->property_name}}</strong></tr>
                       
                    </table>
                </td>
                <th style="padding-top: 10px;padding-left: 20px"><p style="background-color: #000;color: #FFF; text-align: center;padding: 10px;">{{$property->company_code}}</p></th>
            </tr>
        </table>
        </div>
    </div>

      <div class="row">
        <div class="col-md-12" style="text-align: center;color: white;background-color: black; font-size: 18px">
         GENERAL REPORT
        </div><br>
      </div>

      <div class="row">
                <table style='width:100%;border:1px solid #000000;font-size:11pt;' cellspacing='0' cellpadding='5' class='font1'>
                <tr>
                    <td style='width:40%'>
                        <table style='width:90%;padding-right: 0px;' cellpadding='0' cellspacing='0'>
                            <tr>
                                <td style='width:100%;padding:1px;padding-left:10px;' colspan='2'>DEPARTMENT: {{$user->department_name}}</td>
                            </tr>
                            <tr>
                                <td style='width:100%;padding:0px;padding-left:10px;' colspan='2'>{{$user->department_id}}<hr style='color:#000000;height:1px;margin-bottom:3px;margin-top:0px;padding-left:10px;' /></td>
                            </tr>
                            <tr>
                                <td style='width:15%;padding:1px;padding-left:10px;'>SECTION:</td>
                                <td style='width:75%;padding:0px;padding-left:0px;'>{{$user->department_id}}<hr style='color:#000000;height:1px;margin-bottom:3px;margin-top:0px;' /></td>
                            </tr>
                        </table>
                    </td>
                    <td style='width:30%;'>
                        <table style='width:90%;' cellpadding='0' cellspacing='0'>
                            <tr>
                                <td style='width:20%;padding:1px;'>PR No.</td>
                                <td style='width:70%;padding:0px;border-bottom:1px solid #000000;'>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td style='width:20%;padding:1px;'>SAI No.</td>
                                <td style='width:70%;padding:0px;border-bottom:1px solid #000000;'></td>
                            </tr>
                            <tr>
                                <td style='width:20%;padding:1px;'>ObR No.</td>
                                <td style='width:70%;padding:0px;border-bottom:1px solid #000000;'></td>
                            </tr>
                        </table>
                    </td>
                    <td style='width:30%'>
                        <table style='width:95%;' cellpadding='0' cellspacing='0'>
                            <tr>
                                <td style='width:15%;padding:1px;'>Date</td>
                                <td style='width:70%;padding:0px;border-bottom:1px solid #000000;'>&nbsp;222</td>
                            </tr>
                            <tr>
                                <td style='width:15%;padding:1px;'>Budget</td>
                                <td style='width:70%;padding:0px;border-bottom:1px solid #000000;'><strong>&nbsp;PHP 900000</strong></td>
                            </tr>
                            <tr>
                                <td style='width:15%;padding:1px;'>Supplier</td>
                                <td style='width:70%;padding:0px;border-bottom:1px solid #000;'>&nbsp;wawa</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
      </div>


 <div class="">
    <div class="row">
        <table style='width:100%;border:1px solid #000000;font-size:12px;margin-left:auto;margin-right:auto;margin-top:40px;' cellspacing='0' cellpadding='3' class='font1'>
            <tr>
                <td style='width:39%; font-weight:bold;text-align:left;border:1px solid #000000;'>
                REQUESTING OFFICE<br/><br/><br/><br/>
                </td>
                <td style='width:60%;border:1px solid #000000;vertical-align:top;font-weight:bold;' colspan='2' rowspan='3'>
                PURPOSE<br/>
                <div style='width:100%;text-align:center;font-weight:normal;font-size:11pt;' class='font1'>
                  4444
                </div>
                </td>
            </tr>
            <tr>
                <td style='border:1px solid #000000;height:19px;text-align:center;text-transform:uppercase;font-weight:bold;'>
                777
                </td>
            </tr>
            <tr>
                <td style='text-align:center;border:1px solid #000000;text-transform:uppercase;height:19px;font-weight:bold'>
               5656
                </td>
            </tr>
            <tr>
                <td colspan='3' style='background-color:#000000;height:20px;'>
            </tr>
            <tr>
                <td style='width:33%; font-weight:bold;text-align:left;border:1px solid #000000;'>
                APPROPRIATION AVAILABLE
                </td>
                <td style='width:33%; font-weight:bold;text-align:left;border:1px solid #000000;'>
                FUNDS AVAILABLE
                </td>
                <td style='width:33%; font-weight:bold;text-align:left;border:1px solid #000000;'>
                APPROVED
                </td>
            </tr>
            <tr>
                <td style='border:1px solid #000000;height:25px;text-align:center;text-transform:uppercase;font-weight:bold;'>

                </td>
                <td style='border:1px solid #000000;height:25px;text-align:center;text-transform:uppercase;font-weight:bold;'>

                </td>
                <td style='border:1px solid #000000;height:25px;text-align:center;text-transform:uppercase;font-weight:bold;'>

                </td>
            </tr>
            <tr>
                <td style='width:33%; font-weight:bold;text-align:center;border:1px solid #000000;text-transform:uppercase;'>
                3333<br/>
                7676776
                </td>
                <td style='width:33%; font-weight:bold;text-align:center;border:1px solid #000000;text-transform:uppercase;'>
                yyyy<br/>
                7777
                </td>
                <td style='width:33%; font-weight:bold;text-align:center;border:1px solid #000000;text-transform:uppercase;'>
                6666<br/>
               7777
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div style='float:left;font-weight:normal;font-style:italic;font-size:7pt;width:40%;text-align:left;'>7767</div>
    </div>
</div>

<div class="content" >
      <div class="row">
        <table style='width:100%;font-size:14px;text-align:center;border:1px solid #000000;' id='items'  cellpadding='0' cellspacing='0'>

            <thead>
                <tr>
                    <td style='width:7%;font-weight:bold;'>Index</td>
                    <td style='width:7%;font-weight:bold;'>ID</td>
                    <td style='width:7%;font-weight:bold;'>Metaname</td>
                    <td style='width:20%;font-weight:bold;'> Asset name</td>
                    <td style='width:40%;font-weight:bold;'>Qns</td>
                    <td style='width:15%;font-weight:bold;'>Answer</td>
                    <td style='width:15%;font-weight:bold;'>Notification</td>

                    <td style='width:15%;font-weight:bold;'>Posted BY</td>
                    <td style='width:15%;font-weight:bold;'>Date</td>
                </tr>
            </thead>    

            <tbody>
{{$generalReportData}}
               @foreach($generalReportData as $indexKey => $DailyReader)            
                <tr>
                  <td>{{$indexKey+1}}</td>
                    <td>{{$DailyReader->id}}</td>
                  <td>{{$DailyReader->metaname_name}}</td>
                  <td>{{$DailyReader->asset_name}}</td>
                  <td>{{$DailyReader->qns}}</td>
                  <td  style='text-align: center;'>{{$DailyReader->answer}}</td>
                  <td  style='text-align: center;'>{{$DailyReader->answer_label}}</td>

                  <td style='text-align: center;'>{{$DailyReader->PostedBy}}</td>
                  <td style='text-align: center;'>{{$DailyReader->Date}}</td>
                </tr>

                @if($indexKey >= 10)
                        @break
                @endif          

                @endforeach

                @for($i = $count; $i < 10; $i++)
                    <tr><td>&nbsp;</td><td>&nbsp;</td>&nbsp;<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                @endfor

            </tbody>

            <tfoot>
                <tr style="background-color: #b0b1b2;">
                    <td colspan="4" style="text-align: right; font-weight: bold;">
                   Property: {{$property->property_name}}
                  </td>
                  <td colspan="3" style="text-align: left; font-weight: bold;"></td>
                  <td colspan="2" style="text-align: left; font-weight: bold;">
                   Total Items: {{$generalReportData->count()}}
                  </td>

                </tr>
                  <tr style="background-color: #b0b1b2;">
                     <td colspan="3" style="text-align: right; font-weight: bold;">
                 .
                  </td>
                  <td colspan="4" style="text-align: left; font-weight: bold;"></td>
                  <td colspan="2" style="text-align: left; font-weight: bold;">
                  .
                  </td>
                </tr>
                  <tr style="background-color: #b0b1b2;">
                     <td colspan="3" style="text-align: right; font-weight: bold;">
                  </td>
                  <td colspan="4" style="text-align: left; font-weight: bold;"></td>
                  <td colspan="2" style="text-align: left; font-weight:">
                   Printed Date: <strong>{{$current_date}}</strong>
                  </td>
                </tr>
            </tfoot>

        </table>
      </div>
  </div> 
</div>

{{--
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
--}}
</body>
</html>
