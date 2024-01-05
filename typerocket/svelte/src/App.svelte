<script>
  import {wrap} from 'svelte-spa-router/wrap'
  import Router from 'svelte-spa-router'
  
  import Layout from './template/Layout.svelte'
  import HeaderScript from './template/HeaderScript.svelte'
  import PageScript from './template/PageScript.svelte'
  import NotFound from './template/NotFound.svelte'

  const routes = {
      // '/': Home,
      '/': wrap({
          asyncComponent: () => import('./routes/dashboard.svelte')
      }),
      '/dashboard': wrap({
          asyncComponent: () => import('./routes/dashboard.svelte')
      }),

      // Wrapping the Author component
      '/': wrap({
          // asyncComponent: () => import('./template/PageScript.svelte'),
          asyncComponent: () => import('./routes/samples.svelte')
      }),

      '/page1': wrap({
          asyncComponent: () => import('./routes/page1.svelte')
      }),
      '/page2': wrap({
          asyncComponent: () => import('./routes/page2.svelte')
      }),

      // // Wrapping the Book component
      // '/book/*': wrap({
      //     asyncComponent: () => import('./routes/Book.svelte')
      // }),

      // Catch-all route last
      '*': NotFound,
  }

  console.log("PageScript")

</script>

<HeaderScript />
<Layout>
  <Router {routes}/>
</Layout>

