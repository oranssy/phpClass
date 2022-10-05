<!-- 로그인 가입 팝업 -->
<div class="login__popup">
    <div class="login__inner">
        <div class="login__header">
            <h3>로그인</h3>
        </div>
        <div class="login__contents">
            <form name="login" action="../login/loginSave.php" method="POST">
                <fieldset>
                    <legend>로그인 입력폼</legend>
                    <div>
                        <label for="youEmail">이메일</label>
                        <input type="email" name="youEmail" id="youEmail" placeholder="이메일" class="input__style" required>
                    </div>
                    <div>
                        <label for="youPass">비밀번호</label>
                        <input type="password" name="youPass" id="youPass" placeholder="비밀번호" class="input__style" required>
                    </div>
                    <button type="submit" class="input__button">로그인</button>
                </fieldset>
            </form>
        </div>
        <div class="login__footer">
            <div class="btn">
                <a href="#">회원가입</a>
                <a href="#">아이디 찾기</a>
                <a href="#">비밀번호 찾기</a>
            </div>
            <ul class="desc">
                <li>비밀번호 분실시 책임은 본인에게 있습니다.</li>
                <li>회원가입하면 이익은 없습니다. 도움되는 것도 없을 겁니다.</li>
                <li>개발자가 초급이어서 개인정보가 노출될 수 있습니다.</li>
            </ul>
            <button type="button" class="btn-close"><span>닫기</span></button>
        </div>
    </div>
</div>
<!-- 아이디 찾기 팝업 -->
<!-- 아이디 찾기 에러 팝업 -->
<!-- 아이디 찾기 완료 팝업 -->
<!-- 비밀번호 찾기 팝업 -->
<!-- 비밀번호 찾기 에러 팝업 -->
<!-- 비밀번호 찾기 완료 팝업 -->