{* Smarty *}

<table border="0" width="300">
  <tr>
    <th colspan="2" bgcolor="#d1d1d1">
      Guestbook Entries (<a href="{$SCRIPT_NAME}?action=add">add</a>)</th>
  </tr>
  {foreach from=$data item="entry"}
    <tr bgcolor="{cycle values="#dedede,#eeeeee" advance=false}">
      <td>{$entry.surname|escape}</td>        
    <td align="right">
      {$entry.email|escape}</td>        
    <td align="right">
     <a href="index.php?action=edit&id={$entry.id|escape}" >edit</a></td> 
          
    </tr>
    <tr>
 <td align="right">
      {$entry.title|escape}</td>  
      <td colspan="2" bgcolor="{cycle values="#dedede,#eeeeee"}">
        {$entry.text|escape}</td>
    </tr>
   
   
    {foreachelse}
      <tr>
        <td colspan="3">No records</td>
      </tr>
  {/foreach}
</table>
