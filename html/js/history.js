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
      if (each.type === 'other') return
      const poster = each.detail['poster'] ? <img src={each.detail.poster} /> : <div className='no-poster'><div><span>NO IMAGE</span></div></div>
      return (
        <div key={each.id + i} className={'concert-item ' + each.type}>
          <div>
            <h2>{each.detail.title}</h2>
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
                </div>
                <ol className='music-list'>{this.showMusic(each.detail)}</ol>
              </div>
            </div>
          </div>
        </div>
      )
    })
  }

  renderSearch () {
    const searchBarButtonClass = this.state.text ? 'search-bar-button' : 'search-bar-button hidden'
    const searchModeClass = this.state.text ? ' search-mode' : ''
    return (
      <div className={'search-bar' + searchModeClass}>
        <div className='search-frame'>
          <div className='search-box'>
            <div className='search-bar-icon'><i className='fas fa-search'></i></div>
            <input type='text' value={this.state.text} onChange={(e) => this.updateSearch(e.target.value)} ref={(i) => {this.searchRef = i}} placeholder='検索' />
            <div onClick={() => this.resetSearch()} className={searchBarButtonClass}><i className='fas fa-times-circle'></i></div>
          </div>
        </div>
      </div>
    )
  }

  render () {
    const search = this.renderSearch()
    if (this.state.loading || !this.state.list) {
      return (
        <React.Fragment>
          {search}
          <div class='loading'>読み込み中</div>
        </React.Fragment>
      )
    } 
    const concertList = this.renderConcertList()
    const searchResult = this.renderSearchResult()
    // const reverseButton = this.state.text ? false : <div onClick={() => this.reverseList()}>逆順にする</div>
    return (
      <React.Fragment>
        {search}
        {/* {reverseButton} */}
        {concertList}
        {searchResult}
      </React.Fragment>
    )
  }
}

ReactDOM.render(React.createElement(History), document.getElementById('history'))