export default {
  state: {
    lastSearch: {
      from: '',
      to: '',
    }
  },
  mutations: {
    setLastSearch(state, payload) {
      state.lastSearch = payload;
    }
  },
  actions: {
    setLastSearch(context, payload) {
      context.commit('setLastSearch', payload);
      localStorage.setItem('lastSearch', JSON.stringify(payload));
    },
    loadStoredLastSearch(context) {
      const lastSearch = localStorage.getItem('lastSearch');
      if (lastSearch) {
        context.commit('setLastSearch', JSON.parse(lastSearch));
      }
    }
  }
}