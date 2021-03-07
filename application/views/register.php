<div style="width:400px; margin:0 auto;">
    <?php echo validation_errors();?> <!--폼 유효성 검사 auth.php에 작성.-->
    <form action="/index.php/auth/register" method="post">
        <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">이메일</label>
        <input type="email" class="form-control" id="formGroupExampleInput" name="email" value="<?php echo set_value('email');?>"placeholder="이메일을 입력해주세요">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">닉네임</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="nickname" value="<?php echo set_value('nickname');?>" placeholder="닉네임을 입력해주세요">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput3" class="form-label">비밀번호</label>
        <input type="password" class="form-control" id="formGroupExampleInput3" name="password"value="<?php echo set_value('password');?>" placeholder="비밀번호를 입력해주세요">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput4" class="form-label">비밀번호 확인</label>
        <input type="password" class="form-control" id="formGroupExampleInput4" name="re_password" value="<?php echo set_value('re_password');?>" placeholder="비밀번호 확인">
        </div><br>
        <div>
            <button type="submit" class="btn btn-primary">로그인</button>
        </div>
    </form>
</div>