- 表格居中
```html
<table align="center">
```

- bootstrap响应式表格
```html
<div class="table-responsive">
```
- 表格内容水平垂直居中
```html
<th style='text-align: center;'>host</th>   水平居中
<td rowspan=$row_host1 style='vertical-align: middle;'>host1</td>   垂直居中
<td rowspan=$rowspan style='vertical-align: middle;text-align: center;'>hello</td>  既水平又垂直居中
```

- 图片撑满
```css
background-size: cover;
```
- 数据不为空显示
```html
<if condition="$result[0]['jiyao_id'] neq null">
	<tr>
        <td style="vertical-align: middle;text-align:center;width: 20%">
            <span><b>机要编号</b></span>
        </td>
        <td class="description">{$result[0]['jiyao_id']}</td>
    </tr>
</if>
```

- 1 0转换
```html
<if condition="$student.is_searched eq 1">已查询<else/>未查询</if></td>
```