// npm i -g react-tools
// jsx --harmony jsx/ js/
// jsx --harmony *input* *output*
class History extends React.Component {
  constructor (props) {
    super(props)
    this.state = {
      loading: false,
      list: [],
      text: '',
      result: null,
      err: false
    }
    'displayMain' in window.localStorage ? false : window.localStorage['displayMain'] = '1'
    'displayMini' in window.localStorage ? false : window.localStorage['displayMini'] = '0'
    this.searchRef = React.createRef()
  }

  componentDidMount () {
    this.setState({loading: true})
    superagent
    .post('https://app.winds-n.com/web/concert')
    .end((err, res) => {
      if (err) return this.setState({loading: false, err: {type: 'networkError'}})
      this.setState({loading: false, list: res.body.list.reverse()})
    })
  }

  updateSearch (text) {
    this.setState({text})
    this.search(text)
  }

  resetSearch () {
    this.setState({text: '', result: null})
  }

  escapeReg (string) {
    const reRegExp = /[\\^$.*+?()[\]{}|]/g
    const reHasRegExp = new RegExp(reRegExp.source)
    return (string && reHasRegExp.test(string)) ? string.replace(reRegExp, '\\$&') : string
  }

  search (value) {
    if (value === '' || !value) return this.resetSearch()
    const result = this.state.list.map((item) => {
      const concert = item.detail
      return concert.data.map((track) => {
        const s = new RegExp(this.escapeReg(value), 'i')
        // 演奏会名で一致
        if (concert.title.search(s) >= 0) return {concert, track}
        // タイトルで一致
        if (track.title.search(s) >= 0) return {concert, track}
        // サブタイトルで一致
        // if (track.addtitle.search(s) >= 0) return {concert: concert, track}
        // 作曲者名で一致
        if ((track.composer ? track.composer : '').search(s) >= 0) return {concert, track}
        // 編曲者名で一致
        if ((track.arranger ? track.arranger : '').search(s) >= 0) return {concert, track}
      })
    })
    this.setState({result})
  }

  reverseList () {
    this.setState({list: this.state.list.reverse()})
  }

  renderSearchResult () {
    if (!this.state.result) return
    const resultList = this.state.result.map((item, i) => {
      if (!item) return // <div key={i}></div>
      return item.map((each, j) => {
        if (!each) return // <div key={i + j}></div>
        if (each.concert.type === 'other') return
        // const concertType = ' ' + each.concert.type
        // const composer = each.track.composer ? each.track.composer : ''
        const composer = each.track.composer ? each.track.arranger ? <span className='composer'>{each.track.composer}{each.track.composer.match(/民謡/) ? '' : '作曲'}<span>/</span>{each.track.arranger}編曲</span> : <span className='composer'>{each.track.composer}</span> : each.track.arranger ? <span className='composer'>{each.track.arranger}編曲</span> : ''
        return (
          <div key={i + j} className='result-item'>
            <div className={each.concert.type}>
              <span className='concert-title'>{each.concert.title}</span>
              <span className='title'>{each.track.title}</span>
              {composer}
            </div>
          </div>
        )
      })
    })
    return (
      <div className='result-list'>{resultList}</div>
    )
  }

  labeling (label, contents) {
    return <div className='item'><label>{label}</label><div>{contents}</div></div>
  }

  showDate (item) {
    if (item.time['time'] && item.time['label']) {
      const time = <div><div>{item.time.date}</div><div>{item.time.time + item.time.label}</div></div>
      return this.labeling('日時', time)
    }
    const date = <div>{item.time.date}</div>
    return this.labeling('開催日', date)
  }

  showPlace (item) {
    if ('place' in item) {
      const place = item.place.map((each, i) => {
        return <div key={i}>{each}</div>
      })
      return this.labeling('会場', place)
    }
  }

  showConductor (item) {
    if ('conductor' in item) {
      var name = ''
      for (var i in item.conductor) {
        name += item.conductor[i].name + '・'
      }
      return this.labeling('指揮', name.slice(0, -1))
    }
  }

  showGuest (item) {
    // ないときがある
    if (item['guest']) {
    // if ('guest' in item) {
      var list = ''
      for (var i in item.guest) {
        list = item.guest[i].name + '(' + item.guest[i].instrument + ')'
      }
      return this.labeling('客演', list)
    }
  }

  showGuide (item) {
    if ('guide' in item) {
      return <div className='item'><div className='guide'><a href={item.guide}>案内ページ</a></div></div>
    }
  }

  showMusic (item) {
    var data = item.data
    return item.contents.map((list, i) => {
      var ml = list.music.map((ml, j) => {
        var composer = 'composer' in data[ml] ? 'arranger' in data[ml] ? <span className='composer'>{data[ml].composer}{data[ml].composer.match(/民謡/) ? '' : '作曲'}<span>/</span>{data[ml].arranger}編曲</span> : <span className='composer'>{data[ml].composer}</span> : 'arranger' in data[ml] ? <span className='composer'>{data[ml].arranger}編曲</span> : ''
        var additional = 'add' in data[ml] ? <ol>{data[ml].add.map((mv, k) => (<li key={'a' + item.id + k}>{mv}</li>))}</ol> : ''
        var movement = 'movement' in data[ml] ? <ol>{data[ml].movement.map((mv, k) => (<li key={'a' + item.id + k}>{mv}</li>))}</ol> : ''
        return (
          <li key={'m' + item.id + j} className='track'>
            <div><span>{data[ml].title}</span>{composer}{additional}{movement}</div>
          </li>
        )
      })
      return <li key={'l' + item.id + i}><label className={list.label.match(/第[0-9]部/) ? '' : 'other'}>{list.label}</label><ol>{ml}</ol></li>
    })
  }

  renderConcertList () {
    if (this.state.result) return
    return this.state.list.map((each, i) => {
      // if (each.type === 'main' && !this.props.displayMain) return
      // if (each.type === 'mini' && !this.props.displayMini) return
      // if (each.type === 'other' && !this.props.displayOther) return
      if (each.type === 'main' && window.localStorage.displayMain === '0') return
      if (each.type === 'mini' && window.localStorage.displayMini === '0') return
      if (each.type === 'other') return
      const poster = each.detail['poster'] ? <img src={each.detail.poster} /> : <div className='no-poster'><div><span>NO IMAGE</span></div></div>
      return (
        <details key={each.id + i} className={'concert-item ' + each.type}>
          <summary><h2>{each.detail.title}</h2></summary>
          <div>
            <div class='detail'>
              <div className='poster'>
                {poster}
              </div>
              <div className={'overview ' + each.type}>
                <div>
                  {this.showDate(each.detail)}
                  {this.showPlace(each.detail)}
                  {this.showConductor(each.detail)}
                  {this.showGuest(each.detail)}
                  {this.showGuide(each.detail)}
                </div>
                <ol className='music-list'>{this.showMusic(each.detail)}</ol>
              </div>
            </div>
          </div>
        </details>
      )
    })
  }

  toggleConcert (target) {
    window.localStorage[target] = window.localStorage[target] === '1' ? '0' : '1'
    // 状態更新
    this.setState({})
  }

  renderConcertButton () {
    return (
      <div className='controller'>
        <div className={'switch main ' + (window.localStorage.displayMain === '1' ? 'on' : 'off')} onClick={() => this.toggleConcert('displayMain')}>定期演奏会</div>
        <div className={'switch mini ' + (window.localStorage.displayMini === '1' ? 'on' : 'off')} onClick={() => this.toggleConcert('displayMini')}>ミニコンサート</div>
      </div>
    )
  }

  renderTopBar () {
    const searchBarButtonClass = this.state.text ? 'search-bar-button' : 'search-bar-button hidden'
    const searchModeClass = this.state.text ? ' search-mode' : ''
    const concertButton = !this.state.text ? this.renderConcertButton() : false
    return (
      <div className={'search-bar' + searchModeClass}>
        <div className='search-frame'>
          <div className='search-box'>
            <div className='search-bar-icon'><i className='fas fa-search'></i></div>
            <input type='text' value={this.state.text} onChange={(e) => this.updateSearch(e.target.value)} ref={(i) => {this.searchRef = i}} placeholder='検索' />
            <div onClick={() => this.resetSearch()} className={searchBarButtonClass}><i className='fas fa-times-circle'></i></div>
          </div>
        </div>
        {concertButton}
      </div>
    )
  }

  renderNotice () {
    if (window.localStorage['displayMain'] === '0' && window.localStorage['displayMini'] === '0') {
      return (
        <div className='notice'>
          <i className="fas fa-arrow-up"></i>
          <span>演奏会のジャンルを選んでください</span>
        </div>
      )
    } else {
      return <div className='notice'><span>これ以上はありません</span></div>
    }
  }

  render () {
    const topBar = this.renderTopBar()
    if (this.state.loading || !this.state.list) {
      return (
        <React.Fragment>
          {topBar}
          <div class='loading'>読み込み中</div>
        </React.Fragment>
      )
    }
    const concertList = this.renderConcertList()
    const searchResult = this.renderSearchResult()
    const notice = this.renderNotice()
    // const reverseButton = this.state.text ? false : <div onClick={() => this.reverseList()}>逆順にする</div>
    return (
      <React.Fragment>
        {topBar}
        {/* {reverseButton} */}
        {concertList}
        {searchResult}
        {notice}
      </React.Fragment>
    )
  }
}

ReactDOM.render(React.createElement(History), document.getElementById('history'))