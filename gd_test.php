{\rtf1\ansi\ansicpg950\deff0\deflang1033\deflangfe1028{\fonttbl{\f0\fmodern\fprq6\fcharset134 SimSun;}{\f1\fmodern\fprq6\fcharset136 \'b7\'73\'b2\'d3\'a9\'fa\'c5\'e9;}}
{\*\generator Msftedit 5.41.15.1515;}\viewkind4\uc1\pard\lang1028\f0\fs20 <?php\par
if(extension_loaded('gd')) \{\par
  echo '\'c4\'e3\'bf\'c9\'d2\'d4\'ca\'b9\'d3\'c3gd<br>';\par
  foreach(gd_info() as $cate=>$value)\par
    echo "$cate: $value<br>";\par
\}else\par
  echo '\'c4\'e3\'c3\'bb\'d3\'d0\'b0\'b2\'d7\'b0gd\'c0\'a9\'d5\'b9';\par
?>\f1\par
}
 