{* Smarty *}

<form action="{$SCRIPT_NAME}?action=submit" method="post">
  <table border="1">
    {if $error ne ""}
      <tr>
      <td bgcolor="yellow" colspan="2">
      {if $error eq "surname_empty"}You must supply a name.
      {elseif $error eq "email_empty"} You must supply a email.
      {elseif $error eq "password_empty"} You must supply a password.
      {elseif $error eq "title_empty"} You must supply a title.
      {elseif $error eq "text_empty"} You must supply a text.
       {/if}
      </td>
      </tr>
    {/if}
    <tr>
      <td>surname:</td>
      <td>
      <input type="hidden" name="id" value="{$post.id|default:false}">
        <input type="text" name="surname"
          value="{$post.surname|default:''}" size="40">
      </td>
    </tr>
    <tr>
      <td>email:</td>
      <td>
        <input type="text" name="email"
          value="{$post.email|default:''}" size="40">
      </td>
    </tr>
    <tr>
      <td>password:</td>
      <td>
        <input type="text" name="password"
          value="{$post.password|default:''}" size="40">
      </td>
    </tr>
    <tr>
      <td>title:</td>
      <td>
        <input type="text" name="title"
          value="{$post.title|default:''}" size="40">
      </td>
    </tr>
    <tr>
      <td valign="top">text:</td>
      <td>
        <textarea name="text" cols="40" rows="10">{$post.text|default:''}</textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="Submit">
      </td>
    </tr>
  </table>
</form>