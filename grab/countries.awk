BEGIN {print "Country:" }
{
  printf ("  %s:\n", $1)
  printf  ("    name: \"%s\"\n",$2)
  printf  ("    code: \"%s\"\n",$1)
  printf  ("    parseUrl: \"http://freemeteo.com/default.asp?pid=15&la=1&cn=%s\"\n",$1)

}
