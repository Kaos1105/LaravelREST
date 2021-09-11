module.exports = {
  projects: [
    {
      root: './',
      // **optional** default: `[]`
      // Register globally Vue component glob.
      // If you set it, you can get completion by that components.
      // It is relative to root property.
      // Notice: It won't actually do it. You need to use `require.context` or `Vue.component`
      globalComponents: [
        './resources/js/**/*.vue',
        {
          // Component name
          name: 'SuccessOperation',
          // Component file path, please use '/'.
          path: './resources/js/shared/components/SuccessOperation.vue.vue'
        }
      ]
    }
  ]
}