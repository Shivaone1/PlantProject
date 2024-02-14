import React from 'react'

export default function Index() {
  return (
    <>
      <h1 className='text-center'><b>Home Page</b></h1>
      <div className="container d-flex">
        <div class="card" style={{width: '18rem'}}>
          <img class="card-img-top" src="/img/logo.png" alt="Home-image 1" />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style={{width: '18rem'}}>
          <img class="card-img-top" src="/img/logo.png" alt="Home-image 2" />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style={{width: '18rem'}}>
          <img class="card-img-top" src="/img/logo.png" alt="Home-image 3" />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </>
  )
}
