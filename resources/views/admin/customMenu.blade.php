<style>
    .customcontainer {
      width: 40%;
      display: flex;
      justify-content: right;
      align-items: center;
      position: relative;
    }
  
    #toggle {
      -webkit-appearance: none;
    }
  
    .button {
      position: absolute;
      z-index: 999;
      width: 555px;
      height: 65px;
      border-radius: 15px;
      cursor: pointer;
      display: flex;
      justify-content: right;
      align-items: center;
      padding: 0 25px;
      overflow: hidden;
      transition: width 300ms linear;
      background: #2e2f37;
    }
  
    .button:before {
      position: absolute;
      content: "";
      width: 20px;
      height: 2px;
      background: whitesmoke;
      transform: rotate(225deg);
      transition: all 0.4s ease;
    }
  
    .button:after {
      position: absolute;
      content: "";
      width: 20px;
      height: 2px;
      background: whitesmoke;
      transform: rotate(135deg);
      transition: all 0.4s ease;
    }
  
    .nav {
      opacity: 1;
      transition: all 0.5s ease-in-out;
      background: #2e2f37;
      width: 100%;
      border-radius: 5px;
      transform: translateX(-10%);
      padding: 5px;
    }
  
    .nav ul {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: row;
      justify-content: flex-end; 
    }
  
    .nav li {
      opacity: 0;
      list-style: none;
    }
  
    .nav li:nth-child(1) {
      margin-left: 10px;
      transform-origin: bottom;
      animation: itop 300ms 300ms linear forwards;
    }
  
    .nav li:nth-child(2) {
      transform-origin: bottom;
      animation: itop 300ms 400ms linear forwards;
    }
  
    .nav li:nth-child(3) {
      transform-origin: bottom;
      animation: itop 300ms 500ms linear forwards;
    }
  
  
    .nav a {
      transition: all 0.2s linear;
      text-decoration: none;
      color:whitesmoke;
      font-size: 17px;
      width: 160px;
      height: 52px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 10px 0 0;
      border-radius: 15px;
    }
  
    .nav a:hover {
      color: #e13652;
      border-radius: 15px;
    }
  
    #toggle:checked~label .nav {
      display: none;
      opacity: 0;
      transform: translateX(0);
    }
  
    #toggle:checked~.button:before {
      transform: rotate(90deg);
    }
  
    #toggle:checked~.button:after {
      transform: rotate(0deg);
    }
  
    #toggle:checked~.button {
      width: 70px;
      transition: all 0.1s linear;
    }
  
    @media (max-width: 640px) {
      .container {
        width: 100%;
      }
    }
  
    @keyframes itop {
      0% {
        opacity: 0;
        transform: translateY(60px);
      }
  
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
</style>
