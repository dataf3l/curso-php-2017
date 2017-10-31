function test(){
   var c= 1;
   var s= 0;
   while(c<=9){
       if(c >= 5){
          break;
       }
       s = s + 10;
       c++;
   }
   return s
};
test();
