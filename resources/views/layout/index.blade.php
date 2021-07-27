@include('layout.head', $data)
@include('layout.header')
@include('layout.sidebar')
<div id="myContent">
@include($data['content'], $data)
</div>
@include('layout.footer')