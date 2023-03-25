<div class="navbar bg-base-100 sticky top-0 z-30">
    <div class="flex-1">
      <a
      href="/"
      class="btn btn-ghost flex items-center gap-x-2 normal-case text-xl">
      <svg role="img"
      class="w-10 h-10 fill-current"
      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitBook</title><path d="M10.802 17.77a.703.703 0 11-.002 1.406.703.703 0 01.002-1.406m11.024-4.347a.703.703 0 11.001-1.406.703.703 0 01-.001 1.406m0-2.876a2.176 2.176 0 00-2.174 2.174c0 .233.039.465.115.691l-7.181 3.823a2.165 2.165 0 00-1.784-.937c-.829 0-1.584.475-1.95 1.216l-6.451-3.402c-.682-.358-1.192-1.48-1.138-2.502.028-.533.212-.947.493-1.107.178-.1.392-.092.62.027l.042.023c1.71.9 7.304 3.847 7.54 3.956.363.169.565.237 1.185-.057l11.564-6.014c.17-.064.368-.227.368-.474 0-.342-.354-.477-.355-.477-.658-.315-1.669-.788-2.655-1.25-2.108-.987-4.497-2.105-5.546-2.655-.906-.474-1.635-.074-1.765.006l-.252.125C7.78 6.048 1.46 9.178 1.1 9.397.457 9.789.058 10.57.006 11.539c-.08 1.537.703 3.14 1.824 3.727l6.822 3.518a2.175 2.175 0 002.15 1.862 2.177 2.177 0 002.173-2.14l7.514-4.073c.38.298.853.461 1.337.461A2.176 2.176 0 0024 12.72a2.176 2.176 0 00-2.174-2.174"/></svg>
      <span>My Tasks</span>
    </a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li>
          <a
          href="/tasks/new"
          class="items-center flex gap-1 p-2 border">
          <img src = "/add.svg" alt="add"
          class="w-5 h-5 fill-current stroke-white stroke-2"
          />
          New
        </a>
        </li>
      </ul>
    </div>
    <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img src="https://sammidev.codes/sammi.png"
            class="rounded-full w-10 h-10 object-cover border-2 border-white"
            />
          </div>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li>
            <a class="justify-between">
              Profile
              <span class="badge">Pro</span>
            </a>
          </li>
          <li><a>Settings</a></li>
          <li>
            <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
  </div>
