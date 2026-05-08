<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@if($tag_nums )
@foreach($tag_list as $key => $data)
@if($key != $appid)
@if($data['type'] == "ecshop")
     <div class="box">
     <div class="box_1">
      <h3><span class="text">{{ $data['name'] }}</span></h3>
      <div class="boxCenterList clearfix ie6">
        @foreach($data['data'] as $key => $tag)
        <img src="{{ $tag['image'] }}" width="100" height="100" /><br />
        <a href="{{ $tag['url'] }}">{{ $tag['goods_name'] }}</a>
        @endforeach 
      </div>
     </div>
    </div>
    <div class="blank5"></div>
    @elseif($data['type'] == "discuz")  
    <div class="box">
     <div class="box_1">
      <h3><span class="text">{{ $data['name'] }}</span></h3>
      <div class="boxCenterList clearfix ie6">
        @foreach($data['data'] as $key => $tag)
        <a href="{{ $tag['url'] }}">{{ $tag['subject'] }}</a><br />
        @endforeach  
      </div>
     </div>
    </div>
    <div class="blank5"></div>
@endif
@endif    
@endforeach
@endif  