let routes = require('./routes.json');

// route('home',[1])
export default function () {
let args = Array.prototype.slice.call(arguments);
let name = args.shift();

if(routes[name] === undefined){
    console.log('Error: routes[name]')
  }else {
   return '/' + routes[name]
       .split('/')
       .map(function (str) {
           if(str[0] == '{'){
               return args.shift();
           }
           else {
               return str;
           }
       })
       .join('/');
 }
}
