String.prototype.rightChars=function(t){return 0>=t?"":t>this.length?this:this.substring(this.length,this.length-t)},function(t){var r,n,e,o,i,a,p,s,u,h,g,l,c={highlightSpeed:20,typeSpeed:100,clearDelay:500,typeDelay:200,clearOnHighlight:!0,typerDataAttr:"data-typer-targets",typerInterval:2e3};o=function(r,n){return"rgba(0, 0, 0, 0)"===r&&(r="rgb(255, 255, 255)"),t("<span></span>").css("color",r).css("background-color",n)},s=function(t){return!isNaN(parseFloat(t))&&isFinite(t)},p=function(t){t.removeData(["typePosition","highlightPosition","leftStop","rightStop","primaryColor","backgroundColor","text","typing"])},e=function(t){var r=t.data("text"),n=t.data("oldLeft"),o=t.data("oldRight");return r&&0!==r.length?(t.text(n+r.charAt(0)+o).data({oldLeft:n+r.charAt(0),text:r.substring(1)}),void setTimeout(function(){e(t)},g())):void p(t)},n=function(t){t.find("span").remove(),setTimeout(function(){e(t)},a())},r=function(t){var e,a,p,u=t.data("highlightPosition");return s(u)||(u=t.data("rightStop")+1),u<=t.data("leftStop")?void setTimeout(function(){n(t)},i()):(e=t.text().substring(0,u-1),a=t.text().substring(u-1,t.data("rightStop")+1),p=t.text().substring(t.data("rightStop")+1),t.html(e).append(o(t.data("backgroundColor"),t.data("primaryColor")).append(a)).append(p),t.data("highlightPosition",u-1),void setTimeout(function(){return r(t)},h()))},u=function(r){var n;if(!r.data("typing")){try{n=JSON.parse(r.attr(t.typer.options.typerDataAttr)).targets}catch(e){}"undefined"==typeof n&&(n=t.map(r.attr(t.typer.options.typerDataAttr).split(","),function(r){return t.trim(r)})),r.typeTo(n[Math.floor(Math.random()*n.length)])}},t.typer=function(){return{options:c}}(),t.extend(t.typer,{options:c}),t.fn.typer=function(){var r=t(this);return r.each(function(){var r=t(this);"undefined"!=typeof r.attr(t.typer.options.typerDataAttr)&&(u(r),setInterval(function(){u(r)},l()))})},t.fn.typeTo=function(n){var e=t(this),o=e.text(),i=0,a=0;if(o===n)return console.log("Our strings our equal, nothing to type"),e;if(o!==e.html())return console.error("Typer does not work on elements with child elements."),e;for(e.data("typing",!0);o.charAt(i)===n.charAt(i);)i++;for(;o.rightChars(a)===n.rightChars(a);)a++;return n=n.substring(i,n.length-a+1),e.data({oldLeft:o.substring(0,i),oldRight:o.rightChars(a-1),leftStop:i,rightStop:o.length-a,primaryColor:e.css("color"),backgroundColor:e.css("background-color"),text:n}),r(e),e},h=function(){return t.typer.options.highlightSpeed},g=function(){return t.typer.options.typeSpeed},i=function(){return t.typer.options.clearDelay},a=function(){return t.typer.options.typeDelay},l=function(){return t.typer.options.typerInterval}}(jQuery);