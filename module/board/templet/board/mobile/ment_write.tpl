<div id="toolbar">
	<h1>{$setup.title}</h1>
	<a id="backButton" class="button" href="{$link.view}">이전</a>
</div>

<div id="content" class="line">
{$formStart}
	<div class="height5"></div>
	{if $member.idx == 0}
	<div class="titlebox">작성자 기본정보</div>
	<div class="inputbox">
		<table cellpadding="0" cellspacing="0" class="layoutfixed">
		<col width="80" /><col width="100%" />
		<tr>
			<td class="header">이름</td>
			<td class="input"><input type="text" name="name" vlaue="{$data.name}" /></td>
		</tr>
		<tr class="line">
			<td colspan="2"><div></div></td>
		</tr>
		<tr>
			<td class="header">패스워드</td>
			<td class="input"><input type="password" name="password" /></td>
		</tr>
		<tr class="line">
			<td colspan="2"><div></div></td>
		</tr>
		<tr>
			<td class="header">이메일</td>
			<td class="input"><input type="email" name="email" value="{$data.email}" /></td>
		</tr>
		<tr class="line">
			<td colspan="2"><div></div></td>
		</tr>
		<tr>
			<td class="header">홈페이지</td>
			<td class="input"><input type="text" name="homepage" value="{$data.homepage}" /></td>
		</tr>
		</table>
	</div>
	{/if}
	
	<div class="titlebox">내용</div>
	<div class="inputbox">
		<div class="textarea">
			<textarea name="content" class="TEXTAREA">{$data.content}</textarea>
		</div>
	</div>
	
	<div class="titlebox">댓글 옵션</div>
	<div class="inputbox">
		<table cellpadding="0" cellspacing="0" class="layoutfixed">
		<col width="30" /><col width="100%" />
		<tr>
			<td class="check">
				<input type="checkbox" id="is_msg" name="is_msg" value="1"{if $data.is_msg == 'TRUE'} checked="checked"{/if} />
			</td>
			<td class="checkText">댓글등록시, 쪽지로 알림</td>
		</tr>
		<tr class="line">
			<td colspan="2"><div></div></td>
		</tr>
		<tr>
			<td class="check">
				<input type="checkbox" id="is_email" name="is_email" value="1"{if $data.is_email == 'TRUE'} checked="checked"{/if} />
			</td>
			<td class="checkText">댓글등록시, 이메일로 알림</td>
		</tr>
		</table>
	</div>
	
	<div class="submitbox"><input type="submit" value="확인" /></div>
{$formEnd}
</div>

