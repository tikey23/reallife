<style>
label.hamburg { 
   display: block;
   background: #555; width: 75px; height: 50px; 
   position: relative; 
   margin-left: auto; margin-right: auto;
   border-radius: 4px; 
}

input#hamburg {display:none}


.line { 
   position: absolute; 
   left:10px;
   height: 4px; width: 55px; 
   background: #fff; border-radius: 2px;
   display: block; 
   transition: 0.5s; 
   transform-origin: center; 
}

.line:nth-child(1) { top: 12px; }
.line:nth-child(2) { top: 24px; }
.line:nth-child(3) { top: 36px; }

#hamburg:checked + .hamburg .line:nth-child(1){
   transform: translateY(12px) rotate(-45deg);
}

#hamburg:checked + .hamburg .line:nth-child(2){
   opacity:0;
}

#hamburg:checked + .hamburg .line:nth-child(3){
   transform: translateY(-12px) rotate(45deg);
}

nav.topmenu { 
    height: auto; 
    max-height:0; 
    overflow: hidden; 
    transition: all 0.5s;
}

#hamburg:checked + .hamburg  + nav.topmenu { 
    max-height: 600px; 
}

</style>

<div class="row">
    <input type="checkbox" id="hamburg">
    <label for="hamburg" class="hamburg">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </label>

    <nav class="topmenu">
      <ul>
         <li><a href="/tutorial/css-transform.html">Home</a></li>
         <li class="hassub">Submenü
            <ul>
               <li><a href="/css/css-selektor-kontextselektor.html">Selektoren</a></li>
               <li><a href="/css/breakpoints.html">Breakpoints</a></li>
            </ul>
         </li>
         <li><a href="/css/transitions.html">Transition</a></li>
         <li><a href="/html/input-checkbox.html">Checkbox</a></li>
      </ul>
   </nav>

</div>