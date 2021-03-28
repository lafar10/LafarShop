<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
</head>
<body>

    <div id="app"></div>

        <script type="text/babel">

            class App extends React.Component{
                render(){
                    return (
                        <div>
                            <Header />
                            <Main />
                            <Footer/>

                        </div>
                    )
                }
            }

           class Header extends React.Component{
               render(){
                   return (
                       <header>
                                <nav>
                                    <ul>
                                        <li>Home</li>
                                        <li>Contact</li>
                                        <li>Categories</li>
                                        <li>Contact US</li>
                                    </ul>
                                </nav>
                       </header>
                   )
               }
           }

           class Main extends React.Component{
               render(){
                   return (
                        <main>Content</main>
                   )
               }
           }

           class Footer extends React.Component{
               render(){
                   return (
                        <footer>Footer</footer>
                   )
               }
           }

           ReactDOM.render(<App />,document.getElementById('app'));

        </script>



</body>
</html>
