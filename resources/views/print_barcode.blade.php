
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Visitor Gate Pass</title>
</head>
<body>
    <table  border='0' style='width:470px;height:220px;padding-top:-40px;' >
        <tr align='center' >
            <td rowspan='4'  width='30%' style='padding-top:-50px'> <img src="{{URL::asset('/images/logo.jpg')}}" alt="profile Pic" height="90" width="100"></td> 
            <td colspan='3' align='center' >Visitor Pass</td>
        </tr>
        <tr>
            <td width='10%' ></td>
            <td align='left' > Gate Pass No.:</td> 
            <td>{{ $visitors->gate_pass_id }}</td>
        </tr>
        <tr align='left'>
            <td width='10%'></td>
            <td>Visitor Name:</td>
            <td>{{ $visitors->name }}</td>
        </tr>
        <tr align='left'>
            <td width='10%'></td>  
            <td>Company:</td>
            <td>{{ $visitors->company }}</td>
        </tr>
        <tr align='center'>
            <td  rowspan='4'  style='padding-left:10%;padding-bottom:1px;' >{!! DNS2D::getBarcodeHTML("".$visitors->gate_pass_id."-".date('Y-m-d ', strtotime($visitors->created_at))."", "QRCODE",5,4)!!}</td>
            <td></td>
            <td  align='left'>Contact Person:</td>
            <td  align='left'>{{ $visitors->contact_person }}</td>
        </tr>
        <tr>
            <td></td>
            <td> Date In:</td>
            <td>{{date('F d, Y', strtotime($visitors->created_at))}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Time In:</td>
            <td>{{date('H:i', strtotime($visitors->created_at))}}</td>
        </tr>
    </table>
</body>
</html>


  