<form action="/index.php/topic/add" method="post" class="span10">  
    <?php echo validation_errors(); ?> <!-- 사용자에게 유효하지 않은 데이터가 들어왔다는 것을 알림-->
    제목 : <input type="text" name="title" placeholder="제목" class="span12"><br><br>
    본문 : 
    <textarea name="description" placeholder="본문"class="span12" rows="15" cols=""></textarea><br>
    <input type="submit" value="저장" />
</form>